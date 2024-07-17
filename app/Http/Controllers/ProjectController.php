<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'projects' => Project::with('technologies')->get(),
            // 'type' => Type::all() Non è necessario in quanto recupera il nome del type attraverso la RELATIONS delle tabelle
        ];
        return view('admin.index', $data);
        // return 'questo e la rotta index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            
            'type' => Type::all(),
            'technology' => Technology::all()
            
        ];
        return view("admin.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => "required|min:3",
            "description" => "required|min:10",
            "img" => "required",
            "type_id" => "required",
            "technologies" => 'array',
            "technologies" => 'exists:technologies,id',

        ]);

        $data = $request->all();
        $newProject = new Project;
        $newProject->title = $data['title'];
        $newProject->description = $data['description'];
       
        if ($request->has('img')) {
        
            $image_path = Storage::put('uploads', $data['img']);
            $newProject->img= $image_path; 
        }

        $newProject->type_id = $data['type_id'];
        $newProject->save();
        $tech= isset($data['technologies']);

        if (isset($data['technologies'])) {
            $newProject->technologies()->attach($tech);
        }else{
            return redirect()->route('admin.Project.show', $newProject->id);
        }

        return redirect()->route('admin.Project.show', $newProject->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $selectedProject =  Project::findOrFail($id);
        // $selectedTech = Technology::findOrFail();
        $data = [
            "project" => $selectedProject,
            "technology" => $selectedProject->technologies
        ];
        return view("admin.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $selectedProject =  Project::findOrFail($id);
        $data = [
            "project" => Project::findOrFail($id),
            'type' => Type::all(),
            'technology' => Technology::all(),
            // Questo invece è necessario in quanto bisogna passargli tutti gli ID della tabella TYPE
        ];
        return view("admin.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project =  Project::findOrFail($id);
        $data = $request->validate([
            "title" => "required|min:3",
            "description" => "required|min:10",
            "img" => "required|min:5",
            "type_id" => "required",
            "technologies" => 'array',
            "technologies" => 'exists:technologies,id',

        ]);

        $project->update($data);
        if (isset($data['technologies'])) {
            $project->technologies()->sync($data['technologies']);
        }

        return redirect()->route('admin.Project.show', $project->id );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project =  Project::findOrFail($id);
        Storage::delete($project->img);
        $project->delete();

        return redirect()->route('admin.Project.index');
    }
}
