@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <!-- Boton de crear nuevo documento -->
                    <div class="mb-3">
                        <a href="{{ route('documents.create') }}" class="btn btn-success">Crear nuevo documento</a>
                    </div>
                </div>
            </div>

            <!-- Notificaciones de mensajes de éxito o error -->
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>
                        {{ $message }}
                    </p>
                </div>
            @endif

            <!-- Tabla de documentos -->
            <table class="table table-bordered">
                <tr>
                    <th>
                        Descargar
                    </th>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Acción
                    </th>
                </tr>
                @foreach ($documents as $document)
                    <tr>
                        <td>
                            <!-- Botón de descarga -->
                            <a href="{{ url('docs/' . $document->document) }}" download>
                                Descargar documento
                            </a>
                        </td>
                        <td>
                            {{ $document->name }}
                        </td>
                        <td>
                            <!-- Apartado de opciones -->
                            <form action="{{ route('documents.destroy', $document->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Eliminar</button>

                                <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-primary">
                                    Editar
                                </a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            <!-- Paginación -->
            {!! $documents->links() !!}

        </div>
    </div>
</div>
@endsection