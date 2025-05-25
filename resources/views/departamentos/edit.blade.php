@extends('layouts.app')
@section('title', 'Editar Departamento')
@section('content')
<form action="{{ route('departamentos.update', $departamento->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3"><label>Nombre</label><input type="text" name="nombre" class="form-control" value="{{ $departamento->nombre }}"></div><div class="mb-3"><label>Ubicacion</label><input type="text" name="ubicacion" class="form-control" value="{{ $departamento->ubicacion }}"></div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection
