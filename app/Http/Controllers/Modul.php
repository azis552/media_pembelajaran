<?php

namespace App\Http\Controllers;

use App\Models\Moduls;
use Illuminate\Http\Request;

class Modul extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'id_kelas' => 'required',
            'id_kuis' => 'required',
            'document' => 'required|mimes:png,jpg,pdf,doc,docx|max:50000',
        ]);

        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/modul', $name);
            $validate['document'] = $name;
        }

        Moduls::create($validate);

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $modul = Moduls::findOrFail($id);

        if ($modul->delete()) {
            return redirect()->route('dashboard');
        }
    }
}
