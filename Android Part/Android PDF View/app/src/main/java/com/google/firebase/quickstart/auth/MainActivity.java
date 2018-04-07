package com.google.firebase.quickstart.auth;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.Toast;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

public class MainActivity extends AppCompatActivity {
    private static final String TAG = "log";

    Button login;
    Button getStarted;
    int i=0;
    private FirebaseAuth mAuth;

    @Override
    protected void onStart() {

        mAuth = FirebaseAuth.getInstance();
        FirebaseUser currentUser = mAuth.getCurrentUser();

        if (currentUser!=null){
            Toast.makeText(MainActivity.this,"Already Signed In",Toast.LENGTH_SHORT).show();
            Intent intent = new Intent(MainActivity.this,GoogleSignInActivity.class);
            startActivity(intent);
        }
        super.onStart();


    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);






        login =(Button) findViewById(R.id.login);
        getStarted =(Button) findViewById(R.id.get_started);
//        Intent login = new Intent(this, login.class);
//        Intent signin = new Intent(this, signUp.class);

        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent login = new Intent(MainActivity.this, login.class);
                startActivity(login);
            }
        });

        getStarted.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent signup = new Intent(MainActivity.this, signUp.class);
                startActivity(signup);
            }
        });



//        facebook.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View v) {
//                Log.d(TAG, "onClick: ");
//                startActivity(facebookIntent);
//            }
//        });
//        google.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View v) {
//                startActivity(googleIntent);
//            }
//        });
    }
}
