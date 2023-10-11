<?php

namespace App\Repo;
use App\Models\Bodega;
use App\Models\Compra;
use App\Models\Venta;
use Illuminate\Database\Eloquent\Collection;

/* BodegaRepo
* funcion listar()
* funcion venta(ProductID,cantidad) donde se vende un producto de la bodega
* function compra(ProductID,cantidad) donde se compra un producto de la bodega
*/

class BodegaRepo {
    public function listar() {
        return Bodega::all();
    }
    /**
     * Vender un producto de bodega  
     * Si el producto no esta en la bodega => error OK
     * Si el producto esta en bodega, pero no tiene el stock (suficiente), entonces error.
     * En caso contrario, agregar venta, y descontar producto en bodega
     */
    public function venta($productID,$cantidad):Bodega {
        $productosEnBodega=Bodega::where('productID',$productID)->get();
        if($productosEnBodega->isEmpty()) {
            Throw new \RuntimeException("Producto no esta en bodega");
        }
        $productoEnBodega=$productosEnBodega->first();
        if($productoEnBodega->cantidad<$cantidad) {
            throw new \RuntimeException("Stock no disponible para venta");
        }
        $venta=new Venta(['productID'=>$productID,'cantidad'=>$cantidad]);
        $venta->save();
        $productoEnBodega->cantidad=$productoEnBodega->cantidad-$cantidad;
        $productoEnBodega->save();

        return $productoEnBodega;
    }
    /**
     * Se realiza una compra de productos y quedan en bodega  
     * 1) Si el producto no esta en bodega, lo agrega, y guarda la compra
     * 2) Si el producto esta en bodega, descuenta la cantidad y guarda la compra
     */
    public function compra($productID,$cantidad):Bodega {
        $productosEnBodega=Bodega::where('productID',$productID)->get();
        if($productosEnBodega->isEmpty()) {
            $bodega=new Bodega(['productID'=>$productID,'cantidad'=>$cantidad]);
            $bodega->save();
            
        } else {
            $bodega=$productosEnBodega->first();
            $bodega->cantidad=$bodega->cantidad+$cantidad;
            $bodega->save();
        }
        $compra=new Compra(['productID'=>$productID,'cantidad'=>$cantidad]);
        $compra->save();
        return $bodega;
    }

}
