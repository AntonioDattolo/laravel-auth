<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data = [
            'technologies' => Technology::all()
        ];
        return view('technologies.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'description'=> 'required|min:10',
            'icon'=> 'required',
        ]);

        $newTechnology = new Technology();
        $newTechnology->fill($data);
        $newTechnology->save();

        return redirect()->route('admin.Technology.show', $newTechnology);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $selectedTechnology = Technology::findOrFail($id);
        $data = [
            'technologies' => $selectedTechnology
        ];
        return view('technologies.show', $data);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $selectedTechnology =  Technology::findOrFail($id);
        $data = [
            "technology" => $selectedTechnology,

        ];

        return view('technologies.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $technology =  Technology::findOrFail($id);
        $data = $request->validate([
            "name" => "required|min:3",
            "description" => "required|min:10",
            "icon" => "required",

        ]);
        $technology->update($data);

        return redirect()->route('admin.Technology.show', $technology->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $technology =  Technology::findOrFail($id);
        $technology->delete();

        return redirect()->route('admin.Technology.index');
    }
}
