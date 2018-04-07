package com.google.firebase.quickstart.auth;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

public class login extends AppCompatActivity {

    Button loginWithFacebook;
    Button loginWithGoogle;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        loginWithFacebook=(Button) findViewById(R.id.sign_in_fb);
        loginWithGoogle=(Button) findViewById(R.id.sign_in_google);



        loginWithFacebook.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent login = new Intent(login.this, FacebookLoginActivity.class);
                startActivity(login);
            }
        });

        loginWithGoogle.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent signin = new Intent(login.this, GoogleSignInActivity.class);
                startActivity(signin);
            }
        });
    }
}
