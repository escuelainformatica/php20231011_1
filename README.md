# Ejercicio 11-10-2023
Necesitamos crear un sistema para listar e insertar nuevas cuentas para clientes bancarios.

Cree un nuevo proyecto de laravel

Cree el siguiente modelo:

* Cuenta:
  * ID
  * RutCliente
  * NombreCliente
  * Salario
  * Monto

Y cree la clase Repo: CuentaRepo con dos funciones

* Listar() (lista todas las cuentas)
* Ingresar(Cuenta $cuenta) (ingresa una nueva cuenta)
  * con las siguientes condiciones: 
    * No cree cuenta (genere un error) si ya hay una cuenta para ese rut
    * No cree cuenta si el monto es mayor al salario.
    * No cree cuenta si el salario o el monto es menor a cero.

Luego, pruebelo con tinker y cree una prueba de integridad.

Para crear la prueba

> php artisan make:test Prueba1Test

Para probarla

> php artisan test
