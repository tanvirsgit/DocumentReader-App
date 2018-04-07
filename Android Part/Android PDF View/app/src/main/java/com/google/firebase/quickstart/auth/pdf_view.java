package com.google.firebase.quickstart.auth;
import android.content.Intent;
import android.net.Uri;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Toast;

import com.github.barteksc.pdfviewer.PDFView;
import com.github.barteksc.pdfviewer.listener.OnLoadCompleteListener;
public class pdf_view extends AppCompatActivity {
    PDFView pdfView;
    WebView webview;

    @Override
    public void onBackPressed() {
        super.onBackPressed();
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pdf_view);
        pdfView=(PDFView) findViewById(R.id.pdfView);
        webview = (WebView)findViewById(R.id.webview);
        webview.getSettings().setJavaScriptEnabled(true);
        String pdfName ="http://www.pdf995.com/samples/pdf.pdf";
        webview.loadUrl("http://docs.google.com/gview?embedded=true&url=" + pdfName);
        webview.setWebViewClient(new WebViewClient(){
            @Override
            public void onPageFinished(WebView view, String url) {
                super.onPageFinished(view, url);
            }
        });
        //pdfView.fromAsset("@asset/pdf.pdf");
    }
}