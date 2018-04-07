package com.example.cse327.documentReader;

import android.util.Log;
import android.widget.Toast;

import com.google.android.gms.vision.Detector;
import com.google.android.gms.vision.Tracker;
import com.google.android.gms.vision.face.Face;
import com.google.android.gms.vision.face.Landmark;

import org.greenrobot.eventbus.EventBus;

import java.util.List;

public class FaceAndEyeTracker extends Tracker<Face>{
        private static float FOCUSING_PROBABILITY=0.6f;
        private boolean leftEyeVisible,rightEyeVisible;

    @Override
    public void onUpdate(Detector.Detections<Face> detections, Face face) {
        super.onUpdate(detections, face);
        if((face.getIsLeftEyeOpenProbability()<FOCUSING_PROBABILITY)&&(face.getIsRightEyeOpenProbability()<FOCUSING_PROBABILITY))
            EventBus.getDefault().post(new EyesClosedEvent());
        /*
        List<Landmark> landmarks=face.getLandmarks();
        for(int i=0;i<landmarks.size();i++)
        {
            if(landmarks.get(i).getType()==Landmark.LEFT_EYE)
                leftEyeVisible=true;
            else
                leftEyeVisible=false;
            if(landmarks.get(i).getType()==Landmark.RIGHT_EYE)
                rightEyeVisible=true;
            else
                rightEyeVisible=false;

            if (leftEyeVisible==true&&rightEyeVisible==true)
            {
                EventBus.getDefault().post(new FaceNotFoucingOnScreen());
                break;
            }

        }
        */

    }

}
