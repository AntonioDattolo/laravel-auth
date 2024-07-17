<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
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
        $data = $request->all();
        $newProject = new Project;
        $newProject->title = $data['title'];
        $newProject->description = $data['description'];
        $newProject->img = $data['img'];
        if ($request->has('img')) {
            // save the image

            $image_path = Storage::put('uploads', $newProject->img);
            $data['img'] = $image_path;
            //dd($image_path, $val_data);
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
            "img" => "required",
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
        $project->delete();

        return redirect()->route('admin.Project.index');
    }
}
