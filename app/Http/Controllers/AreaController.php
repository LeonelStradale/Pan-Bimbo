<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();

        return view('areas.index', compact('areas'));
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $area = Area::create($request->all());

        return redirect()->route('areas.index')->with('success', 'El área administrativa se guardo con éxito.');
    }

    public function show(Area $area)
    {
        $documents = $area->documents;

        return view('areas.show', compact('area', 'documents'));
    }
}
