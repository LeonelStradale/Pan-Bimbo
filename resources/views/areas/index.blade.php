@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>¡Éxito!</strong> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <strong>¡Error!</strong> {{ $error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        @endforeach
                    </div>
                @endif

                <div class="card shadow-lg">
                    <div class="card-header bg-dark">
                        <div class="row">
                            <div class="col-md-4 mt-1 text-white">
                                ➤ Áreas Administrativas
                            </div>
                            <div class="col-md-8 d-flex flex-row-reverse">
                                <a href="{{ route('areas.create') }}" class="btn btn-success btn-sm mx-1">
                                    Añadir nueva área administrativa
                                    <i class="fa-solid fa-folder-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
                            @foreach ($areas as $area)
                                <div class="col">
                                    <a href="{{ route('areas.show', $area->id) }}"
                                        class="card text-decoration-none bg-primary text-white">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">{{ $area->name }}</h5>
                                            <p
                                                class="card-text text-center mt-4">
                                                <small class="text-body-white">
                                                    Ver documentos
                                                    <i class="fa-solid fa-angle-right"></i>
                                                </small>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
