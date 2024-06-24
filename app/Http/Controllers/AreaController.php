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

    public function show($id)
    {
        $area = Area::findOrFail($id);
        $documents = $area->documents;
        return view('areas.show', compact('area', 'documents'));
    }
}
