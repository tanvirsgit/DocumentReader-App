package com.example.cse327.documentReader;

import android.Manifest;
import android.content.Context;
import android.content.DialogInterface;
import android.content.pm.PackageManager;
import android.os.Bundle;
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

import java.io.IOException;

public class PDFViewer extends AppCompatActivity{

    PDFView pdfView;
    private static  final String[] PERMISSION= new String[]{Manifest.permission.CAMERA};
    private static  final int INT_VALUE=11;
    private FaceDetector faceDetector;
    private FaceAndEyeTracker faceAndEyeTracker;
    private CameraSource cameraSource;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        pdfView=(PDFView)findViewById(R.id.pdfView);
        pdfView.fromAsset("sample.pdf").load();
        requestPermissions(PERMISSION,INT_VALUE);
        Track();
    }

    @Override
    public void onStart() {
        super.onStart();
        EventBus.getDefault().register(this);
    }

    @Override
    public void onStop() {
        super.onStop();
        EventBus.getDefault().unregister(this);
    }

    @Subscribe(threadMode=ThreadMode.MAIN)
    public void readingDocumentEvent(ReadingDocumentEvent event)
    {
        Log.d("Reading Document", "readingDocumentEvent: User is reading the document");
    }

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
                if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
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
                                    requestPermissions(PERMISSION, INT_VALUE);
                                }
                            })
                            .setCancelable(false)
                            .show();
                    return;
                }
            }
        }
    }

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
                .setRequestedFps(30f)
                .setRequestedPreviewSize(640,480)
                .build();
    }

}
