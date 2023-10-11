<?php

namespace Tests\Feature;

use App\Models\Bodega;
use App\Repo\BodegaRepo;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EjemploTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $servicio = new BodegaRepo();
        $bodega = $servicio->compra(100, 10);
        $this->assertEquals(100, $bodega->productID);
        $this->assertEquals(10, $bodega->cantidad);
        $bodega = $servicio->compra(100, 10);
        $this->assertEquals(100, $bodega->productID);
        $this->assertEquals(20, $bodega->cantidad);
        $bodega = $servicio->venta(100, 1);
        $this->assertEquals(19, $bodega->cantidad);
        $this->expectExceptionMessage("Producto no esta en bodega");
        $bodega = $servicio->venta(101, 1);
    }
    public function test_2(): void
    {

        $servicio = new BodegaRepo();
        $bodega = $servicio->compra(100, 10);
        $this->expectExceptionMessage("Stock no disponible para venta");
        $bodega = $servicio->venta(100, 200);

    }

}