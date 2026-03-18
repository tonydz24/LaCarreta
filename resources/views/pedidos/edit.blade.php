<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <h1>Editar Pedido: {{ $pedido->nombre }}</h1>

    <form action="{{ route('pedidos.update', $pedido) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="platillosPedido" class="form-label">Platillos Pedido</label>
            <input type="text" class="form-control" id="platillosPedido" name="platillosPedido" value="{{ $pedido->platillosPedido }}">
        </div>
        <div class="mb-3">
            <label for="mesaPedido" class="form-label">Mesa de Orden</label>
            <input type="number" class="form-control" id="mesaPedido" name="mesaPedido" value="{{ $pedido->mesaPedido }}">
        </div>
        <div class="mb-3">
            <label for="totalPedido" class="form-label">Total del Pedido</label>
            <input type="number" step="0.01" class="form-control" id="totalPedido" name="totalPedido" value="{{ $pedido->totalPedido }}">
        </div>
        <div class="mb-3">
            <label for="tipoPago" class="form-label">Tipo de Pago</label>
            <input type="text" class="form-control" id="tipoPago" name="tipoPago" value="{{ $pedido->tipoPago }}">
        </div>
        <div class="mb-3">
            <label for="numeroPedido" class="form-label">Número de Pedido</label>
            <input type="number" class="form-control" id="numeroPedido" name="numeroPedido" value="{{ $pedido->numeroPedido }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>

    <div class="d-flex justify-content-end">
        <a href="{{ route('pedidos.index') }}">
            <button class="btn btn-secondary">Volver a la lista de pedidos</button>
        </a>
    </div>

    @endsection
</body>
</html>