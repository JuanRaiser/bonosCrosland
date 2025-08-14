<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Moto;

class CuponController extends Controller
{
    public function index()
    {
        $motos = Moto::select('id_moto', 'Nombre')->get();
        return Inertia::render('Revisarcupon', ['motos' => $motos]);
    }
}
