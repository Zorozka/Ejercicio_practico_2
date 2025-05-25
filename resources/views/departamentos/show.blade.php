@extends('layouts.app')
@section('title', 'Detalle de Departamento')
@section('content')
<ul class="list-group">
    <li class='list-group-item'><strong>Nombre:</strong> {{ $departamento->nombre }}</li><li class='list-group-item'><strong>Ubicacion:</strong> {{ $departamento->ubicacion }}</li>
</ul>
<a href="{{ route('departamentos.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
