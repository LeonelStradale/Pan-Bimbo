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
                                <!-- Modal: Buscar Usuario -->
                                <button type="button" class="btn btn-primary btn-sm mx-1" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalBU">
                                    Buscar usuario
                                    <i class="fa-solid fa-search"></i>
                                </button>
                                <!-- Modal: Buscar Usuario -->
                                <div class="modal fade" id="exampleModalBU" tabindex="-1"
                                    aria-labelledby="exampleModalBULabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title text-white" id="exampleModalBULabel">
                                                    Buscar usuario por Matrícula o Clave
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="p">
                                                    Ingresa la matrícula de un estudiante o la clave de una persona que esté
                                                    inscrito en el gimnasio
                                                    para poder acceder a su información y actualizarla.
                                                </p>
                                                <form action="#" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <!-- Matrícula -->
                                                        <div class="col-md-12 mb-2">
                                                            <div class="form-outline">
                                                                <label class="form-label text-dark" for="matricula">
                                                                    Matrícula | Clave
                                                                </label>
                                                                <input type="text" id="matricula"
                                                                    class="form-control form-control-lg"
                                                                    placeholder="Ej. 482100078" name="matricula" required
                                                                    autofocus />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-grid gap-2 pt-2">
                                                        <button class="btn btn-primary" type="submit">
                                                            Encontrar Usuario
                                                            <i class="fa-solid fa-search"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
                            @foreach ($areas as $area)
                                <div class="col">
                                    <a href="{{ route('areas.show', $area->id) }}"
                                        class="card h-100 text-decoration-none bg-primary text-white">
                                        <div class="card-body d-flex align-items-center justify-content-center">
                                            <h5 class="card-title text-center">{{ $area->name }}</h5>
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
