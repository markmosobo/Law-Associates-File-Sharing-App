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
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        File::create($request->all());
     
        return redirect()->route('files.index')
                        ->with('success','File created successfully.');
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
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $file->update($request->all());
    
        return redirect()->route('files.index')
                        ->with('success','File updated successfully');
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
