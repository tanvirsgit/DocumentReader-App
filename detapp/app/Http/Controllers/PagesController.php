<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function about(){
        $data = array(
            'technologies' => ['PHP', 'Laravel', 'Python', 'Pygaze']
        );
        return view('pages.about')->with($data);
    }
    public function help(){
        return view('pages.help');
    }
}
