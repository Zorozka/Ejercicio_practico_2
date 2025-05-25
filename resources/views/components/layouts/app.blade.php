<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('categorias.index') }}">Listado de Categorías</a></li>
            <li><a href="{{ route('categorias.create') }}">Crear Categoría</a></li>
            <li><a href="{{ route('productos.index') }}">Listado de Productos</a></li>
            <li><a href="{{ route('productos.create') }}">Crear Producto</a></li>
        </ul>
    </nav>

    <div>
        @yield('content')
    </div>
</body>
</html>