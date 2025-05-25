@extends('layouts.app')
@section('title', 'Crear Empleado')
@section('content')
<form action="{{ route('empleados.store') }}" method="POST">
    @csrf
    <div class="mb-3"><label>Nombre</label><input type="text" name="nombre" class="form-control"></div><div class="mb-3"><label>Email</label><input type="text" name="email" class="form-control"></div><div class="mb-3"><label>Dni</label><input type="text" name="dni" class="form-control"></div><div class="mb-3"><label>Departamento_id</label><input type="text" name="departamento_id" class="form-control"></div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
@endsection
