@extends('layouts.app')
@section('title', 'Departamentos')
@section('content')
<a href="{{ route('departamentos.create') }}" class="btn btn-primary mb-3">Crear Departamento</a>
<table class="table table-bordered">
    <thead>
        <tr><th>Nombre</th><th>Ubicacion</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($departamentos as $departamento)
        <tr>
        <td>{{ $departamento->nombre }}</td><td>{{ $departamento->ubicacion }}</td>
        <td>
            <a href="{{ route('departamentos.show', $departamento->id) }}" class="btn btn-info btn-sm">Ver</a>
            <a href="{{ route('departamentos.edit', $departamento->id) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('departamentos.destroy', $departamento->id) }}" method="POST" style="display:inline;">
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
