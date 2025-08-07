<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'id_cliente' => 'required|string',
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'cupon' => 'required|string|max:255',
            'id_moto' => 'required|integer',
        ]);

        // Create a new Registro instance
        $registro = new \App\Models\Registro();
        $registro->id_cliente = $request->input('id_cliente');
        $registro->nombre = $request->input('nombre');
        $registro->apellidos = $request->input('apellidos');
        $registro->cupon = $request->input('cupon');
        $registro->id_moto = $request->input('id_moto');

        // Save the Registro to the database
        $registro->save();

        // Return a response
        return response()->json(['message' => 'Registro created successfully', 'data' => $registro], 201);
    }
}
