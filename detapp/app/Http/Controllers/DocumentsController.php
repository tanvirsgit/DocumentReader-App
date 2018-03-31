<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Document;
use DB;

class DocumentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$documents = Document::orderBy('title', 'desc')->get();
        //$documents = Document::orderBy('title', 'desc')->take(1)->get();
        //$documents = DB::select('SELECT * FROM documents');
        //$document = Document::where('title', 'Document Two')->get();
        $documents = Document::orderBy('created_at', 'desc')->paginate(5);

        //$documents = Document::all();

        return view('documents.index')->with('documents', $documents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'initials' => 'required',
            'document_pdf' => ''
        ]);

        // Handle File Upload
        if($request->hasFile('document_pdf')){
            // Get filename with the extension
            $filenameWithExt = $request->file('document_pdf')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('document_pdf')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('document_pdf')->storeAs('public/document_pdfs', $fileNameToStore);
        } else {
            $fileNameToStore = 'nodocument.pdf';
        }

        // Create Document

        $document = new Document;
        $document->title = $request->input('title');
        $document->initials = $request->input('initials');
        $document->user_id = auth()->user()->id;
        $document->document_pdf = $fileNameToStore;
        $document->save();

        return redirect('/documents')->with('success', 'Document Uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::find($id);
        return view('documents.show')->with('document', $document);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::find($id);

        // Check for correct user

        if(auth()->user()->id !== $document->user_id){
            return redirect('/documents')->with('error', 'Unauthorized Page');
        }
        return view('documents.edit')->with('document', $document);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'initials' => 'required'
        ]);

        // Handle File Upload
        if($request->hasFile('document_pdf')){
            // Get filename with the extension
            $filenameWithExt = $request->file('document_pdf')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('document_pdf')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('document_pdf')->storeAs('public/document_pdfs', $fileNameToStore);
        }

        // Update Document

        $document = Document::find($id);
        $document->title = $request->input('title');
        $document->initials = $request->input('initials');
        if($request->hasFile('document_pdf')){
            $document->document_pdf = $fileNameToStore;
        }
        $document->save();

        return redirect('/documents')->with('success', 'Document Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::find($id);

        // Check for correct user
        if(auth()->user()->id !== $document->user_id){
            return redirect('/documents')->with('error', 'Unauthorized Page');
        }

        if($document->document_pdf != 'nodocument.pdf'){
            // Delete Image
            Storage::delete('public/document_pdfs/'.$document->document_pdf);
        }
        
        $document->delete();
        return redirect('/documents')->with('success', 'Document Deleted');
    }
}
