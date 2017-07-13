<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\Stock;
use App\Usuario;
use App\Producto;
use App\categoria_productos;


class DatabaseSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       // El spatie guarda un cache con los permisos . para eliminarlos se utiliza el comando 
       // php artisan cache:forget spatie.permission.cache

        // Permisos:
         // supr-admin
        $permission = Permission::create(['name' => 'Crear categoria']);      
        $permission = Permission::create(['name' => 'Nombrar producto']);

        // Directores
        $permission = Permission::create(['name' => 'Consultar reportes pedidos']);
        $permission = Permission::create(['name' => 'stock productos']);
        // Adm pañol
        $permission = Permission::create(['name' => 'Agregar stock']);
        $permission = Permission::create(['name' => 'Eliminar producto']);
        
        $permission = Permission::create(['name' => 'Estado pedido']);
        $permission = Permission::create(['name' => 'Registrar entrega']);
        $permission = Permission::create(['name' => 'Registrar devolucion']);
        
        $permission = Permission::create(['name' => 'Crear usuarios']);
        $permission = Permission::create(['name' => 'Consultar reporte por alumno']);
        
        // Usuarios
        $permission = Permission::create(['name' => 'Solicitar online']);
        $permission = Permission::create(['name' => 'Solicitar producto']);
        $permission = Permission::create(['name' => 'Consultar pedidos']);
        
        // Roles:

        $role = Role::create(['name' => 'SuperAdmin']);
        $role->givePermissionTo('Crear categoria', 'Nombrar producto');
      
        $role = Role::create(['name' => 'Director']);
        $role->givePermissionTo('Consultar reportes pedidos','stock productos');

        $role = Role::create(['name' => 'AdmPanol']);
        $role->givePermissionTo('Agregar stock', 'Eliminar producto');
        $role->givePermissionTo('Estado pedido', 'Registrar entrega', 'Registrar devolucion');
        $role->givePermissionTo('Crear usuarios', 'Consultar reporte por alumno');

        $role = Role::create(['name' => 'Usuario']);
        $role->givePermissionTo('Solicitar producto' ,'Consultar pedidos');
          
        $role = Role::create(['name' => 'Profesor']);
        $role->givePermissionTo('Solicitar producto' ,'Consultar pedidos' , 'Solicitar online');
        // Usuarios:


       

       

//usuario superadmin
        $usuario= new Usuario();
        $usuario->rut='17421672-k';
        $usuario->nombre='Cristopher';
        $usuario->apellido='Gonzalez';
        $usuario->direccion='ramon cruz';
        $usuario->telefono='1234';
        $usuario->escuela='informatica';
        $usuario->correo='admin@admin.com';
        $usuario->save();
        $user=new User();
        $user->name='Cristopher';
        $user->rut= '17421672-k';  
        $user->email= 'admin@admin.com'; 
        $user->password= 'admin'; 
        $user->save();
        $user->assignRole('SuperAdmin');
        $usuario->users()->save($user);

  //director
        $usuario= new Usuario();
        $usuario->rut='16642493-3';
        $usuario->nombre='ronald';
        $usuario->apellido='Gonzalez';
        $usuario->direccion='ramon cruz';
        $usuario->telefono='123456';
        $usuario->escuela='telecumicaciones';
        $usuario->correo='director@director.com';
        $usuario->save();
        $user=new User();
        $user->name='ronald';
        $user->rut= '16642493-3';  
        $user->email= 'director@director.com'; 
        $user->password= 'director'; 
        $user->save();
        $user->assignRole('Director');
        $usuario->users()->save($user);

         //pamolero
        $usuario= new Usuario();
        $usuario->rut='12345678-k';
        $usuario->nombre='daniel';
        $usuario->apellido='montero';
        $usuario->direccion='ramon cruz';
        $usuario->telefono='12345678';
        $usuario->escuela='la calle';
        $usuario->correo='admpanol@admpanol.com';
        $usuario->save();
        $user=new User();
        $user->name='daniel';
        $user->rut= '12345678-k';  
        $user->email= 'admpanol@admpanol.com'; 
        $user->password= 'admin'; 
        $user->save();
        $user->assignRole('AdmPanol');
        $usuario->users()->save($user);

//categorias
        $categoria= new categoria_productos();
        $categoria->nombre='Libros';
        $categoria->save();
        $categoria= new categoria_productos();
        $categoria->nombre='Revistas';
        $categoria->save();
        $categoria= new categoria_productos();
        $categoria->nombre='Peliculas';
        $categoria->save();

        //productos

        $producto= new Producto();
        $producto->nombre_producto='Papelucho';
        $producto->MarcaProveedor='Marcela paz';
        $producto->cantidad_disponible='5';
        $producto->observacion='Nuevo';
        $producto->id_cat_producto='1';
        $producto->save();
            for ($i = 1; $i <= 5; $i++)
                {
                    $stock = new Stock();
                    $stock->producto_id=1;
                    $stock->fecha='2017-05-05';
                    $stock->nombre='Papelucho';
                    $stock->marca='Marcela Paz';
                    $stock->cantidad='0';
                    $stock->save();
                }

         $producto= new Producto();
        $producto->nombre_producto='muy interesante';
        $producto->MarcaProveedor='magacine';
        $producto->cantidad_disponible='7';
        $producto->observacion='Nuevo';
        $producto->id_cat_producto='2';
        $producto->save();
            for ($i = 1; $i <= 7; $i++)
                {
                    $stock = new Stock();
                    $stock->producto_id=2;
                    $stock->fecha='2017-05-05';
                    $stock->nombre='muy interesante';
                    $stock->marca='magacine';
                    $stock->cantidad='0';
                    $stock->save();
                }

        $producto= new Producto();
        $producto->nombre_producto='titanic';
        $producto->MarcaProveedor='disney';
        $producto->cantidad_disponible='2';
        $producto->observacion='Nuevo';
        $producto->id_cat_producto='3';
        $producto->save();
            for ($i = 1; $i <= 2; $i++)
                {
                    $stock = new Stock();
                    $stock->producto_id=3;
                    $stock->fecha='2017-05-05';
                    $stock->nombre='titanic';
                    $stock->marca='disney';
                    $stock->cantidad='0';
                    $stock->save();
                }



        
    }
}
