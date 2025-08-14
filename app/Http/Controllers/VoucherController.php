<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Moto;
use App\Models\Voucher;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    public function store(Request $request)
    {
        // 1️⃣ Validar datos de entrada
        $validated = $request->validate([
            'dni' => 'required|string|max:15',
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'precio' => 'nullable|numeric', // precio manual opcional
            'moto_id' => 'required|exists:moto,id_moto',
        ]);

        // 2️⃣ Buscar o crear cliente
        $cliente = Cliente::firstOrCreate(
            ['dni' => $validated['dni']],
            [
                'nombre' => $validated['nombre'],
                'apellidos' => $validated['apellidos']
            ]
        );

        // 3️⃣ Obtener datos de la moto
        $moto = Moto::findOrFail($validated['moto_id']);

        // 4️⃣ Guardar voucher
        $voucher = Voucher::create([
            'id_cliente'   => $cliente->id_cliente,
            'id_moto'      => $moto->id_moto,
            'precio_final' => $moto->precio_final, // tomado de la DB
            'precio'       => $validated['precio'], // manual
        ]);

        return response()->json([
            'message' => 'Voucher creado correctamente',
            'voucher' => $voucher
        ], 201);
    }
}
