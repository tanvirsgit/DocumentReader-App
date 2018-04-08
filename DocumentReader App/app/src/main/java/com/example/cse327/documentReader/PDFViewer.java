package com.example.cse327.documentReader;

import android.Manifest;
import android.content.DialogInterface;
import android.content.pm.PackageManager;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.Bundle;
import android.os.Environment;
import android.os.Handler;
import android.support.v4.content.ContextCompat;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.widget.Toast;

import com.github.barteksc.pdfviewer.PDFView;
import com.google.android.gms.vision.CameraSource;
import com.google.android.gms.vision.face.FaceDetector;
import com.google.android.gms.vision.face.LargestFaceFocusingProcessor;

import org.greenrobot.eventbus.EventBus;
import org.greenrobot.eventbus.Subscribe;
import org.greenrobot.eventbus.ThreadMode;

import java.io.ByteArrayOutputStream;
import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;

public class PDFViewer extends AppCompatActivity{

    private PDFView pdfView;
    private static  final String[] PERMISSIONS= new String[]{Manifest.permission.CAMERA,
                                                             Manifest.permission.READ_EXTERNAL_STORAGE,
                                                             Manifest.permission.WRITE_EXTERNAL_STORAGE};
    private static  final int INT_VALUE=11;
    private FaceDetector faceDetector;
    private FaceAndEyeTracker faceAndEyeTracker;
    private CameraSource cameraSource;
    private Handler handler;
    private int interval=10000;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        pdfView=(PDFView)findViewById(R.id.pdfView);
        pdfView.fromAsset("sample.pdf").load();
        requestPermissions(PERMISSIONS,INT_VALUE);
        Track();
        handler=new Handler();
        startTakingPicture();
    }

    Runnable periodicalPhotoTaker=new Runnable() {
        @Override
        public void run() {
            takePicture();
            handler.postDelayed(periodicalPhotoTaker,interval);
        }
    };

    public void startTakingPicture(){
        periodicalPhotoTaker.run();
    }
    public void stopTakingPicture(){
        handler.removeCallbacks(periodicalPhotoTaker);
    }

    //Method for taking picture
    public void takePicture(){
        cameraSource.takePicture(new CameraSource.ShutterCallback() {
            @Override
            public void onShutter() {
                Log.d("Take pic", "Picture clicked");
            }
        }, new CameraSource.PictureCallback() {
            @Override
            public void onPictureTaken(byte[] bytes) {
                Bitmap bitmap= BitmapFactory.decodeByteArray(bytes,0,bytes.length);
                ByteArrayOutputStream byteArrayOutputStream=new ByteArrayOutputStream();
                bitmap.compress(Bitmap.CompressFormat.JPEG,80,byteArrayOutputStream);
                File picture=new File(Environment.getExternalStorageDirectory(),File.separator+String.valueOf(System.currentTimeMillis()+"CSE327.jpg"));
                try{
                    picture.createNewFile();
                    FileOutputStream fileOutputStream=new FileOutputStream(picture);
                    fileOutputStream.write(byteArrayOutputStream.toByteArray());
                    fileOutputStream.flush();
                    fileOutputStream.close();
                    Log.d("Take pic", "Picture taken");
                }catch (Exception e)
                {
                    e.printStackTrace();
                    Log.e("Pic Error","Pic not saved");
                }
            }
        });
    }
    //Registering eventbus to this activity in onStart method
    @Override
    public void onStart() {
        super.onStart();
        EventBus.getDefault().register(this);
    }

    //Unregistering eventbus from this activity in osStop method
    @Override
    public void onStop() {
        super.onStop();
        EventBus.getDefault().unregister(this);
        cameraSource.stop();
    }

    @Override
    public void onDestroy(){
        super.onDestroy();
        cameraSource.stop();
        faceDetector.release();
        stopTakingPicture();
    }

    //Observer that listens the event ReadingDocumentEvent
    @Subscribe(threadMode=ThreadMode.MAIN)
    public void readingDocumentEvent(ReadingDocumentEvent event)
    {
        Log.d("Reading Document", "readingDocumentEvent: User is reading the document");
    }

    //Observer that listens the event EyesClosedEvent
    @Subscribe(threadMode=ThreadMode.MAIN)
    public void eyesClosedEvent(EyesClosedEvent event)
    {
        Log.d("eyes closed","Closed");
    }

    //Reference : https://developer.android.com/training/permissions/requesting.html?#java
    @Override
    public void onRequestPermissionsResult(int requestCode, String permissions[], int[] grantResults) {
        switch (requestCode) {
            case INT_VALUE: {
                // If request is cancelled, the result arrays are empty.
                if (grantResults.length ==3 && grantResults[0] == PackageManager.PERMISSION_GRANTED
                                            && grantResults[1] == PackageManager.PERMISSION_GRANTED
                                            && grantResults[2] == PackageManager.PERMISSION_GRANTED) {
                    startCamera();
                    return;
                }
                else {
                    AlertDialog.Builder alertDialog = new AlertDialog.Builder(this);
                    alertDialog.setTitle("Permission for camera")
                            .setMessage("Permission needed for eye tracking while reading")
                            .setPositiveButton("Grant", new DialogInterface.OnClickListener() {
                                @Override
                                public void onClick(DialogInterface dialog, int which) {
                                    requestPermissions(PERMISSIONS, INT_VALUE);
                                }
                            })
                            .setCancelable(false)
                            .show();
                    return;
                }
            }
        }
    }

    // Starting the camera source for video stream through which face will be detected
    public void startCamera(){
        if(ContextCompat.checkSelfPermission(getApplicationContext(),Manifest.permission.CAMERA)==PackageManager.PERMISSION_GRANTED)
        {
            try{
                cameraSource.start();
                Toast.makeText(this,"Camera started",Toast.LENGTH_LONG).show();
            }
            catch (IOException e) {
                e.printStackTrace();
                Toast.makeText(this,"Camera not started",Toast.LENGTH_LONG).show();
            }
        }
        return;
    }

    //Method implementing necessary classes and methods to detect face
    public void Track(){

        faceAndEyeTracker=new FaceAndEyeTracker();
        faceDetector=new FaceDetector.Builder(getApplicationContext())
                .setProminentFaceOnly(true)
                .setTrackingEnabled(true)
                .setMode(FaceDetector.FAST_MODE)
                .setClassificationType(FaceDetector.ALL_CLASSIFICATIONS)
                .setLandmarkType(FaceDetector.ALL_LANDMARKS)
                .build();
        faceDetector.setProcessor(
                new LargestFaceFocusingProcessor.Builder(
                        faceDetector,faceAndEyeTracker).build());

        if(faceDetector.isOperational())
            Toast.makeText(this,"Working",Toast.LENGTH_LONG).show();

        cameraSource=new CameraSource.Builder(this,faceDetector)
                .setFacing(CameraSource.CAMERA_FACING_FRONT)
                .setRequestedFps(10f)
                .setRequestedPreviewSize(640,480)
                .build();
    }

}
