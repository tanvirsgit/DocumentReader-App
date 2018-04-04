@extends('layouts.app')

@section('content')
    
    <div class="container">
            <h1 style="text-align: center">About</h1>
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <h2>Privacy policy</h2>
            <a href="//www.iubenda.com/privacy-policy/37994603" class="iubenda-white iubenda-embed" title="Privacy Policy">Privacy Policy</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src = "//cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
            <p>Developed Using: </p>
            @if(count($technologies) > 0)
                <ul>
                    @foreach($technologies as $technology)
                    <li>{{$technology}}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="col-md-4 col-sm-4">
            <h2>Contributors: </h2>
            <h4>Sarwat Islam Dipanzan</h4>
            <h4>Niyaz Bin Hashem</h4>
            <h4>Rifat Arefin Badhon</h4>
            <h4>Taskin Fatema</h4>
            <h4>Md. Nasir Uddin</h4>
            <h4>Sakif Md. Fahim</h4>
            <h4>Abdullah Al Noman Abir</h4>
            <h4>Farhan Tanvir</h4>
        </div>
    </div>
</div>
    
@endsection
