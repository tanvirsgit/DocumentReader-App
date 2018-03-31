package com.google.firebase.quickstart.auth;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.ImageButton;

public class MainActivity extends AppCompatActivity {
    private static final String TAG = "log";

    ImageButton facebook;
    ImageButton google;
    ImageButton phone;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        facebook =(ImageButton) findViewById(R.id.facebook);
        google =(ImageButton) findViewById(R.id.google);
        Intent facebookIntent = new Intent(this, FacebookLoginActivity.class);
        Intent googleIntent = new Intent(this, GoogleSignInActivity.class);

        facebook.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Log.d(TAG, "onClick: ");
                startActivity(facebookIntent);
            }
        });
        google.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(googleIntent);
            }
        });
    }
}
