<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Loads index page
    public function index(){
        return view('pages.index');
    }

    // Loads about page
    public function about(){
        $data = array(
            'technologies' => ['PHP', 'Laravel', 'Javascript', 'Webgazer.js']
        );
        return view('pages.about')->with($data);
    }

    // Loads help page
    public function help(){
        return view('pages.help');
    }
}
