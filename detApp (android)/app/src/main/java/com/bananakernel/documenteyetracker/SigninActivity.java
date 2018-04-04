package com.bananakernel.documenteyetracker;

import android.content.Intent;
import android.databinding.DataBindingUtil;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;


import com.android.volley.toolbox.JsonArrayRequest;


import com.android.volley.NetworkResponse;
import com.android.volley.ParseError;
import com.android.volley.Response;
import com.android.volley.Response.ErrorListener;
import com.android.volley.Response.Listener;

import org.json.JSONArray;
import org.json.JSONException;

import java.io.UnsupportedEncodingException;

import com.bananakernel.documenteyetracker.databinding.ActivitySigninBinding;
import com.bananakernel.documenteyetracker.databinding.ActivitySplashBinding;

public class SigninActivity extends AppCompatActivity {
    ActivitySigninBinding binding;
    Button signIn;
    EditText emailAddress;
    EditText pass;
    private RequestQueue mQueue;
    String compare;

    private void jsonParse() {

        String url = "http://192.168.1.107/dashboard/jsonrest.php";

        JsonArrayRequest request = new JsonArrayRequest(url,
                new Response.Listener<JSONArray>() {

                    public void onResponse(JSONArray response) {
                        try {
                            // `response` is the JSONArray that you need to iterate
                            for (int i = 0; i < response.length(); i++) {
                                JSONObject o = response.getJSONObject(i);
//                                int id = o.getInt("id");
                                String email = o.getString("email");
                                String password = o.getString("email");


                                compare = (email +password);
                                //Toast.makeText(SigninActivity.this,compare,Toast.LENGTH_SHORT).show();
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                error.printStackTrace();
            }
        });

        mQueue.add(request);
       // Toast.makeText(SigninActivity.this,compare,Toast.LENGTH_SHORT).show();

    }
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        binding = DataBindingUtil.setContentView(this,R.layout.activity_signin);
        signIn  = (Button) findViewById(R.id.btn_signin);
        emailAddress = (EditText) findViewById(R.id.et_email_address);
        pass = (EditText) findViewById(R.id.et_password);
        mQueue = Volley.newRequestQueue(this);

        signIn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                jsonParse();
                Toast.makeText(SigninActivity.this,compare,Toast.LENGTH_SHORT).show();
                //Log.d("SignUp", "onClick: "+emailAddress.getText());
            }
        });

    }
    public void signin(View view)
    {
        startActivity(new Intent(this,SigninActivity.class));
        Log.d("Workingg", "signin: ");
    }

    public void getStarted(View view)
    {
        startActivity(new Intent(this,SignupActivity.class));
    }
}
