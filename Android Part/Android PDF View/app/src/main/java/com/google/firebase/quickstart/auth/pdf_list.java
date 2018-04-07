package com.google.firebase.quickstart.auth;

import android.content.Intent;
import android.support.design.widget.NavigationView;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

import java.util.ArrayList;
import java.util.Arrays;

public class pdf_list extends AppCompatActivity {

    private ArrayAdapter<String> listAdapter ;
    ListView pdfList;
    private FirebaseAuth mAuth;



    @Override
    public void onBackPressed() {
        moveTaskToBack(true);
        super.onBackPressed();
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pdf_list);

        pdfList=(ListView) findViewById(R.id.pdf_list_view);



        String[] pdfNames = new String[] { "Pdf 1", "pdf two", "pdf three", "Mars",
                "Jupiter", "Saturn", "Uranus", "Neptune","Pdf 1", "pdf two", "pdf three", "Mars",
                "Jupiter", "Saturn", "Uranus", "Neptune"};
        final ArrayList<String> list = new ArrayList<String>();
        list.addAll(Arrays.asList(pdfNames));
        listAdapter = new ArrayAdapter<String>(this, R.layout.listview, list);
        pdfList.setAdapter(listAdapter);



        pdfList.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                Toast.makeText(pdf_list.this,String.valueOf(position),Toast.LENGTH_SHORT).show();
                Intent intent = new Intent(pdf_list.this,pdf_view.class);
                startActivity(intent);
            }
        });
    }
}
