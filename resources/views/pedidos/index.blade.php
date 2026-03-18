<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de pedidos</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <h1>Consulta de Pedidos</h1>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('pedidos.create') }}">
            <button class="btn btn-success mb-3"><i class="fa-solid fa-plus"></i> Registrar nuevo pedido</button>
        </a>
        <form action="{{ route('cerrar') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger mb-3"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</button>
        </form>
    </div>



    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Platillos del pedido</th>
                <th>Mesa de orden</th>
                <th>Total del pedido</th>
                <th>Tipo de pago</th>
                <th>Numero de pedido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->platillosPedido }}</td>
                    <td>{{ $pedido->mesaPedido }}</td>
                    <td>{{ $pedido->totalPedido }}</td>
                    <td>{{ $pedido->tipoPago }}</td>
                    <td>{{ $pedido->numeroPedido }}</td>
                    <td>
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('pedidos.edit', $pedido) }}">
                            <button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> </button>
                        </a>
                    @else
                        <a href="{{ route('pedidos.edit', $pedido) }}">
                            <button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> </button>
                        </a>
                        <form action="{{ route('pedidos.destroy', $pedido) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este pedido?')"><i class="fa-solid fa-trash"></i> </button>
                        </form>
                    @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>