@extends('layout')
@section('titulo')
    -listado
@endsection
@section('body')
<div class="row mt-3">
    <div class="col-md-4 offset-md-4">
    <a class="btn btn-dark" href="{{route('alumnos.create')}}">
        <i class="fa-solid fa-plus"></i> Agregar
    </a>
</div>
</div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr><th>#</th><th>MATRICULA</th><th>NOMBRE</th><th>CARRERA</th><th>FECHA DE NACIMIENTO</th></tr>
                    </thead>
                    <tbody>
                        @foreach ($alumnos as $i => $item) 
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $item->matricula }}</td>
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->carrera }}</td>
                                <td>{{ $item->fecha_nacimiento }}</td>
                                <td><a class="btn btn-info" href="{{route('alumnos.edit', $item->id)}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td>
                                    <form action="{{route('alumnos.destroy', $item->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                    <button class="btn btn-danger" href=""><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection