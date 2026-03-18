<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidosModel extends Model
{
    protected $table = 'pedidos';
    protected $fillable = [
        'platillosPedido',
        'mesaPedido',
        'totalPedido',
        'tipoPago',
        'numeroPedido'
    ];
}
