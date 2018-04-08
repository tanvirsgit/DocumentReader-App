package com.example.cse327.documentReader;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.TextView;

public class ReportView extends AppCompatActivity {
    private TextView textView;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_report_view);
        textView=(TextView)findViewById(R.id.editText);
        Bundle bundle=getIntent().getExtras();
        long duration=bundle.getLong("Value1");
        textView.setText(String.valueOf(duration));
    }
}
