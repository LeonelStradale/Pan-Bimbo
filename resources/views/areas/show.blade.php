@extends('layouts.app')

<style>
    .download-btn {
        position: absolute;
        top: -15px;
        right: -15px;
        z-index: 10;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .download-btn i {
        font-size: 1rem;
    }
</style>

@section('content')
    <div class="container">
        <h1>Documentos del Área: {{ $area->name }}</h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
            @foreach ($documents as $document)
                <div class="col">
                    <div class="card h-100">
                        <div class="position-relative">
                            <iframe src="{{ url('docs/' . $document->document) }}" class="card-img-top"
                                style="height: 300px;"></iframe>
                            <a href="{{ url('docs/' . $document->document) }}" download
                                class="btn btn-lg btn-danger download-btn d-flex justify-content-center rounded-lg">
                                <i class="fa-solid fa-download"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $document->name }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
