@extends('layouts.app')
@section('title', 'Crear Departamento')
@section('content')
<form action="{{ route('departamentos.store') }}" method="POST">
    @csrf
    <div class="mb-3"><label>Nombre</label><input type="text" name="nombre" class="form-control"></div><div class="mb-3"><label>Ubicacion</label><input type="text" name="ubicacion" class="form-control"></div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
@endsection
