<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Moto;
use App\Models\Voucher;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class VoucherController extends Controller
{
    public function store(Request $request)
    {
        // 1️⃣ Validar datos de entrada
        $validated = $request->validate([
            'dni' => 'required|string|max:15',
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'id_moto' => 'required|exists:moto,id_moto',
        ]);

        // 2️⃣ Buscar o crear cliente
        $cliente = Cliente::firstOrCreate(
            [
                'dni' => $validated['dni'],
                'nombre' => $validated['nombre'],
                'apellidos' => $validated['apellidos']
            ]
        );

        // 3️⃣ Obtener datos de la moto
        $moto = Moto::find($request->id_moto);
         if (!$moto) {
            return back()->withErrors(['id_moto' => 'La moto seleccionada no existe.']);
        }
        // 4️⃣ Guardar voucher
        $voucher = Voucher::create([
            'id_cliente'   => $cliente->id_cliente,
            'id_moto'      => $moto->id_moto,
            'precio_final' => $moto->precio_base, // tomado de la DB
            // 'precio'       => $validated['precio'], // manual
        ]);

        return redirect()->route('voucher.index')
                     ->with('success', 'Voucher registrado correctamente');
    }
    public function index(Request $request)
    {
        $voucherData = null;

        if ($request->filled('dni')) {
            $voucherData = Cliente::where('dni', $request->dni)
                ->with(['voucher.moto']) // relaciones en los modelos
                ->first();
        }

        return Inertia::render('voucher', [
            'voucherData' => $voucherData
        ]);
    }

}
