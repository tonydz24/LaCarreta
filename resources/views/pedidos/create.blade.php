<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Pedidos</title>
</head>
<body>

    @extends('layouts.app')
    @section('content')

    <h1>Registrar pedido</h1>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('pedidos.index') }}">
            <button class="btn btn-secondary mb-3"><i class="fa-solid fa-arrow-left"></i> Regresar a la consulta de pedidos</button>
        </a>
    </div>
    

    <form action="{{ route('pedidos.store') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="platillosPedido" placeholder="Nombre de los platillos" class="form-control" required>
        </div>
        <div class="input-group mb-3">
            <input type="number" step="0.01" name="mesaPedido" placeholder="Mesa de orden" class="form-control" required>
        </div>
        <div class="input-group mb-3">
            <input type="number" step="0.01" name="totalPedido" placeholder="Total del pedido" class="form-control" required>
        </div>
        <div class="input-group mb-3">
            <input type="text" name="tipoPago" placeholder="Tipo de pago" class="form-control" required>
        </div>
        <div class="input-group mb-3">
            <input type="number" name="numeroPedido" placeholder="Número de pedido" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
    </form>

    @endsection
</body>
</html>