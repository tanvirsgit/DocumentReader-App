package com.bananakernel.documenteyetracker;

import android.content.Intent;
import android.databinding.DataBindingUtil;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import com.bananakernel.documenteyetracker.databinding.ActivitySigninBinding;
import com.bananakernel.documenteyetracker.databinding.ActivitySignupBinding;

public class SignupActivity extends AppCompatActivity {
    ActivitySignupBinding binding;
    Button signUp;
    EditText fullName;
    EditText emailAddress;
    EditText pass;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        binding = DataBindingUtil.setContentView(this,R.layout.activity_signup);
        signUp = (Button) findViewById(R.id.btn_signup);
        emailAddress = (EditText) findViewById(R.id.et_email_address);
        pass = (EditText) findViewById(R.id.et_password);
        fullName = (EditText) findViewById(R.id.et_full_name);

        signUp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Log.d("SignUp", "onClick: ");
            }
        });

    }
    public void signin(View view)
    {
        startActivity(new Intent(this,SigninActivity.class));
    }

    public void getStarted(View view)
    {
        startActivity(new Intent(this,SignupActivity.class));
    }
}
