@php
    use App\Enums\DocumentType;
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-around">
            <div class="col-md-12 mt-2">

                <div class="row">
                    <div class="col-md-9">
                        <div class="card shadow-lg">
                            <div class="card-header text-white bg-success">
                                Vista previa: {{ $document->name }}
                                <i class="fa-solid fa-file-pen"></i>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('documents.update', $document) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <!-- Name -->
                                        <div class="col-md-3 mb-2">
                                            <div class="form-outline">
                                                <label class="form-label" for="name">
                                                    Nombre
                                                </label>
                                                <input type="text" id="name" class="form-control form-control-lg"
                                                    value="{{ $document->name }}" disabled />
                                            </div>
                                        </div>
                                        <!-- Area -->
                                        <div class="col-md-6 mb-2">
                                            <div class="form-outline">
                                                <label class="form-label" for="area">
                                                    Área Administrativa
                                                </label>
                                                <input type="text" id="area" class="form-control form-control-lg"
                                                    value="{{ $document->area->name }}" disabled />
                                            </div>
                                        </div>
                                        <!-- Type -->
                                        <div class="col-md-3 mb-2">
                                            <div class="form-outline">
                                                <label class="form-label" for="type_of_area">
                                                    Tipo de Documento
                                                </label>
                                                <input type="text" id="type_of_area" class="form-control form-control-lg"
                                                    value="{{ $document->type_of_document }}" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <a href="{{ route('documents.index') }}" class="btn btn-secondary w-100">
                                    Volver
                                    <i class="fa-solid fa-rotate-left"></i>
                                </a>
                            </div>
                            <div class="col">
                                <a href="{{ route('documents.edit', $document) }}" class="btn btn-primary w-100">
                                    Editar
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-danger w-100">
                                    Eliminar
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <iframe src="{{ url('docs/' . $document->document) }}" class="card-img-top"
                                style="widht: 300px; height: 300px;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
