<?php

namespace App\Http\Controllers;

use App\Models\PedidosModel;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = PedidosModel::all();
        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pedidos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        PedidosModel::create([
            'platillosPedido' => $request->platillosPedido,
            'mesaPedido' => $request->mesaPedido,
            'totalPedido' => $request->totalPedido,
            'tipoPago' => $request->tipoPago,
            'numeroPedido' => $request->numeroPedido
        ]);

        return redirect()->route('pedidos.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PedidosModel $pedido)
    {
        return view('pedidos.edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PedidosModel $pedido)
    {
        $request->validate([
            'platillosPedido' => 'required',
            'mesaPedido' => 'required',
            'totalPedido' => 'required|numeric|min:0',
            'tipoPago' => 'required',
            'numeroPedido' => 'required|integer|min:0'
        ]);

        $pedido->update($request->all());

        return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PedidosModel $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado correctamente');
    }
}
