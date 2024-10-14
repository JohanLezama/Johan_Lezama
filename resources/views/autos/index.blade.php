@extends('layout')
@section('title', 'Listado de Coches')
@section('body')

<style>
    

    .card {
        background: rgba(255, 255, 255, 0.8);
        border: none;
    }

    .input-group-text {
        background-color: #d3dce6;
        color: #666;
        border: none;
    }

    .form-control:focus {
        border-color: #d3dce6;
        box-shadow: 0 0 10px rgba(211, 220, 230, 0.5);
    }

    .btn-success {
        background-color: #d3dce6;
        border: none;
    }

    .btn-success:hover {
        background-color: #eef1f5;
    }

    .btn-primary {
        background-color: #e57373;
        border: none;
    }

    .btn-primary:hover {
        background-color: #ef9a9a;
    }

    .btn-warning {
        background-color: #ffcc80;
        border: none;
    }

    .btn-warning:hover {
        background-color: #ffe0b2;
    }

    .btn-danger {
        background-color: #ef5350;
        border: none;
    }

    .btn-danger:hover {
        background-color: #ef9a9a;
    }
</style>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Características</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($autos as $auto)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $auto->nombre }}</td>
                    <td>{{ $auto->caracteristicas }}</td>
                    <td>{{ $auto->precio }}</td>
                    <td>
                        @if($auto->imagen)
                            <img src="{{ asset('storage/' . $auto->imagen) }}"  width="100">
                        @else
                            No imagen
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('autos.edit', $auto->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('autos.destroy', $auto->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
