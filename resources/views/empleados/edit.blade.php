@extends('layouts.app')
@section('title', 'Editar Empleado')
@section('content')
<form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3"><label>Nombre</label><input type="text" name="nombre" class="form-control" value="{{ $empleado->nombre }}"></div><div class="mb-3"><label>Email</label><input type="text" name="email" class="form-control" value="{{ $empleado->email }}"></div><div class="mb-3"><label>Dni</label><input type="text" name="dni" class="form-control" value="{{ $empleado->dni }}"></div><div class="mb-3"><label>Departamento_id</label><input type="text" name="departamento_id" class="form-control" value="{{ $empleado->departamento_id }}"></div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection
