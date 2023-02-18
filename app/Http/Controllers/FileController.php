<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::latest()->paginate(5);
    
        return view('files.index',compact('files'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf, docx|max:2048'
        ]);
    
        // File::create($request->all());
        $file = new File;

        if($request->file()){
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            // $file->name = time().'_'.$request->file->getClientOriginalName();
            $file->file_path = '/storage/' . $filePath;
            $file->detail = $request->detail;
            $file->title = $request->title;
            $file->save();
            return redirect()->route('files.index')
            ->with('success','File uploaded and created successfully.');
        }
     

    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        return view('files.show',compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        return view('files.edit',compact('file'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,docx|max:2048'
        ]);
    
        $file = new File;

        if($request->file()){
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            // $file->name = time().'_'.$request->file->getClientOriginalName();
            $file->file_path = '/storage/' . $filePath;
            $file->detail = $request->detail;
            $file->title = $request->title;
            $file->update();
            return redirect()->route('files.index')
            ->with('success','File updated successfully');
        }    

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        $file->delete();
    
        return redirect()->route('files.index')
                        ->with('success','File deleted successfully');
    }
}
