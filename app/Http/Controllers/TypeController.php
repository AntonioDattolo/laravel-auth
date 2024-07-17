<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data = [
            'type' => Type::all()
        ];
        return view('type.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description'=> 'required',
            'icon'=> 'required',
        ]);

        $newType = new Type();
        $newType->fill($data);
        $newType->save();

        return redirect()->route('admin.Type.show', $newType);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $selectedType = Type::findOrFail($id);
        $data = [
            'type' => $selectedType
        ];
        return view('type.show', $data);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $selectedType =  Type::findOrFail($id);
        $data = [
            "type" => $selectedType,

        ];

        return view('type.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $type =  Type::findOrFail($id);
        $data = $request->validate([
            "name" => "required|min:3",
            "icon" => "required",
            "description" => "required|min:10",

        ]);
        $type->update($data);

        return redirect()->route('admin.Type.show', $type->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type =  Type::findOrFail($id);
        $type->delete();

        return redirect()->route('admin.Type.index');
    }
}