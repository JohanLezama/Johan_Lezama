@extends('Autos.form')

@section('formName')
    Crear Coche
@endsection

@section('action')
    action="{{ route('autos.store') }}"
@endsection
