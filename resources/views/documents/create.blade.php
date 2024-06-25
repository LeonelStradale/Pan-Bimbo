@php
    use App\Enums\DocumentType;
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <strong>¡Error!</strong> {{ $error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        @endforeach
                    </div>
                @endif

                <div class="card shadow-lg">
                    <div class="card-header text-white bg-success">
                        Añadir nuevo documento
                        <i class="fa-solid fa-file-circle-plus"></i>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Name -->
                                <div class="col-md-3 mb-2">
                                    <div class="form-outline">
                                        <label class="form-label" for="name">
                                            Nombre
                                        </label>
                                        <input type="text" id="name"
                                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            placeholder="ej. F-DIR..." name="name" value="{{ old('name') }}" required
                                            autofocus />
                                        @error('name')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Area -->
                                <div class="col-md-6 mb-2">
                                    <div class="form-outline">
                                        <label class="form-label" for="area_id">Área Administrativa</label>
                                        <select class="form-control form-control-lg" id="area_id" name="area_id" required>
                                            <option selected disabled>Escoge una área</option>
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Type -->
                                <div class="col-md-3 mb-2">
                                    <div class="form-outline">
                                        <label class="form-label" for="type_of_document">
                                            Tipo de Documento
                                        </label>
                                        <select class="form-control form-control-lg" id="type_of_document"
                                            name="type_of_document" required>
                                            <option selected disabled>Escoge un tipo</option>
                                            @foreach (DocumentType::cases() as $type)
                                                <option value="{{ $type->value }}"
                                                    {{ old('type_of_document') == $type->value ? 'selected' : '' }}>
                                                    {{ $type->value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Doc -->
                                <div class="col-md-12 mt-2">
                                    <div class="form-outline">
                                        <label class="form-label" for="document">
                                            Subir archivo
                                        </label>
                                        <input type="file" name="document" class="form-control form-control-lg">
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-success">
                                    Guardar
                                    <i class="fa-solid fa-floppy-disk"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
