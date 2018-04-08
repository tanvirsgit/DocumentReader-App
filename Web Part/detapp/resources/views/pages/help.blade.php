@extends('layouts.app')

@section('content')
    <br><br>
    <div class="container">
        <center>
            <h1>Help Page</h1>
            <br>
            <h2>Registration</h2>
            <br>
            <img src="{{ asset('img/register.png') }}" alt="">
            <br><br>
            <p>Register to the site using the register button</p>
            <br><br>
            <h2>Login</h2>
            <br><br>
            <img src="{{ asset('img/login.png') }}" alt="">
            <br><br>
            <p>You can login to the site using your registered credentials, or</p>
            <p>you can also use Google or Github to login to the site.</p>
            <br><br>
            <h2>Dashboard</h2>
            <br><br>
            <img src="{{ asset('img/dashboard.png') }}" alt="">
            <br><br>
            <p>You can access the dashboard after loggin in</p>
            <p>The dashboard provides access to already uploaded documents, or you may choose to upload new documents via the Upload Documents button</p>
            <br><br>
            <h2>Upload Documents</h2>
            <br><br>
            <img src="{{ asset('img/upload.png') }}" alt="">
            <br><br>
            <p>You can upload documents after providing in the document title and teacher initial</p>
            <p>You can browse for the chosen document browse button</p>
            <br><br>
            <h2>Documents Page</h2>
            <br><br>
            <img src="{{ asset('img/documents.png') }}" alt="">
            <br><br>
            <p>The documents page will display all the uploaded documents along with the name of the uploader and initials</p>
            <p>The eye icon is a button which will enable the tracker module and turn on tracking</p>
            <br><br>
            <h2>End tracker</h2>
            <br><br>
            <img src="{{ asset('img/end.png') }}" alt="">
            <br><br>
            <p>Clicking the eye dispatch icon will end the tracker activities which will log data to the console</p>
            <br><br>
            <h2>Calibration</h2>
            <br><br>
            <img src="{{ asset('img/calibrate.png') }}" alt="">
            <br><br>
            <p>You can calibrate the tracker for accurate tracking by clicking the calibration page from the navbar</p>
            <p>The site will guide you through the process</p>
            <br><br>
            <hr>

            
        </center>
        
    </div>
    
@endsection
