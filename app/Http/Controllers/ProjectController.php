<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'projects' => Project::all()
        ];
        return view('admin.index', $data);
        // return 'questo e la rotta index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view("admin.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request -> all();
        $newProject = new Project;
        $newProject->title = $data['title'];
        $newProject->description = $data['description'];
        $newProject->img = $data['img'];
        $newProject->save();
        return redirect()->route('admin.Project.show', $newProject->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $selectedProject =  Project::findOrFail($id);
        $data =[
            "project" => $selectedProject
        ];
        return view("admin.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $selectedProject =  Project::findOrFail($id);
        $data =[
            "project" => $selectedProject
        ];
        return view("admin.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            "title" => "required",
            "description" => "required",
            "img" => "required",
            
        ]);
        
        
        // $project->fill($data);
        // $project->save();
        $project->update($data);
        return redirect()->route('admin.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
