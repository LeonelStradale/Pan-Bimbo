<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::latest()->paginate(10);

        return view("documents.index", compact("documents"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("documents.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Se validan los datos
        $request->validate([
            'name' => 'required',
            'document' => 'required',
        ]);

        $data = $request->all();

        // Se valida el documento y se crea una ruta para su guardado en una carpeta del proyecto
        if ($document = $request->file('document')) {
            $destinationPath = 'docs/'; // Ruta de guardado
            $fileName = date('YmdHis') . '.' . $document->getClientOriginalExtension(); // Formato de nombre de guardado
            $document->move($destinationPath, $fileName); // Mover a la carpeta destino
            $data['document'] = $fileName; // Asignar al campo de guardado
        }

        Document::create($data);

        return redirect()->route('documents.index')->with('success', 'El documento se guardo con éxito.');
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
    public function edit(Document $document)
    {
        return view('documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'name' => 'required',
            'document' => 'file|mimes:pdf,doc,docx|max:2048',
        ]);

        $input = $request->all();

        if ($file = $request->file('document')) {
            $destinationPath = 'docs/';
            $fileName = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $input['document'] = "$fileName";

            if ($document->document) {
                $oldFilePath = public_path($destinationPath . $document->document);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
        }

        $document->update($input);

        return redirect()->route('documents.index')->with('success', 'El documento se ha actualizado con éxito.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        // Elimina el documento
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'El documento se elimino con éxito.');
    }
}
