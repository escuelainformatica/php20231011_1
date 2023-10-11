<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Http\Requests\StoreBodegaRequest;
use App\Http\Requests\UpdateBodegaRequest;
use App\Repo\BodegaRepo;
use Illuminate\Http\Request;


class BodegaController extends Controller
{
    public function listar(BodegaRepo $bodegaRepo)
    {
        $bodegas = $bodegaRepo->listar();
        return view('listar', ['bodegas' => $bodegas]);
    }
    public function listarAPI(BodegaRepo $bodegaRepo)
    {
        $bodegas = $bodegaRepo->listar();
        return $bodegas;
    }
    public function comprar(BodegaRepo $bodegaRepo, $id, $cantidad)
    {
        $bodegas = $bodegaRepo->compra($id, $cantidad);
        return $bodegas;
    }
    public function comprarv2(BodegaRepo $bodegaRepo, Request $request)
    {
        $id = $request->get("id", 0); // $_GET['id'];
        $cantidad = $request->get("cantidad", 0);


        $bodegas = $bodegaRepo->compra($id, $cantidad);
        return $bodegas;
    }
    public function vender(BodegaRepo $bodegaRepo, $id, $cantidad)
    {
        $bodegas = $bodegaRepo->venta($id, $cantidad);
        return $bodegas;
    }

}