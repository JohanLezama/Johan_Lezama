@extends('Autos.form')

@section('formName')
    Editar a <b>{{ $auto->nombre }}</b>
@endsection

@section('action')
    action="{{ route('autos.update', $auto) }}"
@endsection    

@section('method')
    @method('PUT')
@endsection
