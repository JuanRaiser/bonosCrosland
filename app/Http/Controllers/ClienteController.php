<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Moto;
use Inertia\Inertia;
use Illuminate\Container\Attributes\Log;
use Illuminate\Support\Facades\DB;


class ClienteController extends Controller
{
    public function create()
    {
        $motos = Moto::select('id_moto', 'nombre', 'model', 'precio', 'bono')->get();

        return Inertia::render('Revisarcupon', [
            'motos' => $motos,
        ]);
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'dni'       => 'required|string|size:8',
            'nombre'    => 'required|string|max:255',
            'apellidos' => 'nullable|string|max:255',
            'moto_id'   => 'required|exists:moto,id_moto',
        ]);

        $cliente = Cliente::create([
            'dni'       => $request->dni,
            'nombre'    => $request->nombre,
            'apellidos' => $request->apellidos,
        ]);
        $moto = Moto::findOrFail($request->moto_id);

        \DB::table('vouchers')->insert([
        'id_cliente'   => $cliente->id_cliente,  // asumiendo PK = id
        'id_moto'      => $moto->id_moto,
        'precio_final' => $moto->precio_base,
        'created_at'   => now(),
        'updated_at'   => now(),
    ]);
        return redirect()->route('cliente.create')
            ->with('success', 'Cliente y voucher guardado correctamente');
    }
}
