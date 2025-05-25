@extends('layouts.app')
@section('title', 'Detalle de Empleado')
@section('content')
<ul class="list-group">
    <li class='list-group-item'><strong>Nombre:</strong> {{ $empleado->nombre }}</li><li class='list-group-item'><strong>Email:</strong> {{ $empleado->email }}</li><li class='list-group-item'><strong>Dni:</strong> {{ $empleado->dni }}</li><li class='list-group-item'><strong>Departamento_id:</strong> {{ $empleado->departamento_id }}</li>
</ul>
<a href="{{ route('empleados.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
