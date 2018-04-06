package com.example.cse327.documentReader;

import android.Manifest;
import android.content.DialogInterface;
import android.content.pm.PackageManager;
import android.os.Bundle;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;

import com.github.barteksc.pdfviewer.PDFView;

public class PDFViewer extends AppCompatActivity {

    PDFView pdfView;
    private static  final String[] PERMISSION= new String[]{Manifest.permission.CAMERA};
    private static  final int INT_VALUE=11;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        pdfView=(PDFView)findViewById(R.id.pdfView);
        pdfView.fromAsset("sample.pdf").load();
        requestPermissions(PERMISSION,INT_VALUE);
    }

    //Reference : https://developer.android.com/training/permissions/requesting.html?#java
    @Override
    public void onRequestPermissionsResult(int requestCode, String permissions[], int[] grantResults) {
        switch (requestCode) {
            case INT_VALUE: {
                // If request is cancelled, the result arrays are empty.
                if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                    //facetracking code will go here
                } else {
                    AlertDialog.Builder alertDialog = new AlertDialog.Builder(this);
                    alertDialog.setTitle("Permission for camera")
                            .setMessage("Permission needed for eye tracking while reading")
                            .setPositiveButton("Grant", new DialogInterface.OnClickListener() {
                                @Override
                                public void onClick(DialogInterface dialog, int which) {
                                    requestPermissions(PERMISSION, INT_VALUE);
                                }
                            })
                            .show();
                }
            }
            return;
        }
    }
}
