@extends('layouts.app')
@section('title', 'Empleados')
@section('content')
<a href="{{ route('empleados.create') }}" class="btn btn-primary mb-3">Crear Empleado</a>
<table class="table table-bordered">
    <thead>
        <tr><th>Nombre</th><th>Email</th><th>Dni</th><th>Departamento_id</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($empleados as $empleado)
        <tr>
        <td>{{ $empleado->nombre }}</td><td>{{ $empleado->email }}</td><td>{{ $empleado->dni }}</td><td>{{ $empleado->departamento_id }}</td>
        <td>
            <a href="{{ route('empleados.show', $empleado->id) }}" class="btn btn-info btn-sm">Ver</a>
            <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
            </form>
        </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
