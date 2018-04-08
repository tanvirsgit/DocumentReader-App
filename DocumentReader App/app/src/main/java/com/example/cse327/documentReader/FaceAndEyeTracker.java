package com.example.cse327.documentReader;

import com.google.android.gms.vision.Detector;
import com.google.android.gms.vision.Tracker;
import com.google.android.gms.vision.face.Face;

import org.greenrobot.eventbus.EventBus;

public class FaceAndEyeTracker extends Tracker<Face>{
        private static float FOCUSING_PROBABILITY=0.6f;
    @Override
    public void onUpdate(Detector.Detections<Face> detections, Face face) {
        super.onUpdate(detections, face);
        if((face.getIsLeftEyeOpenProbability()<FOCUSING_PROBABILITY)&&(face.getIsRightEyeOpenProbability()<FOCUSING_PROBABILITY))
            EventBus.getDefault().post(new EyesClosedEvent());
        else if((face.getIsLeftEyeOpenProbability()>FOCUSING_PROBABILITY)&&(face.getIsRightEyeOpenProbability()>FOCUSING_PROBABILITY))
            EventBus.getDefault().post(new ReadingDocumentEvent());
    }

}
