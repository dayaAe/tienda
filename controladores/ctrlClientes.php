<?php
class ControladorClientes{
    //Función para recibir los datos para guardar cliente
    public function crtlGuardarCliente(){
        
        if (isset($_POST['cedula']) &&
            isset($_POST['nombre']) &&
            isset($_POST['apellido']) &&
            isset($_POST['direccion']) &&
            isset($_POST['telefono']) &&
            isset($_POST['correo'])){
                $tabla ="cliente";
                $data = array('cedula' => $_POST['cedula'],
                             'nombre' => $_POST['nombre'],
                             'apellidos' => $_POST['apellido'],
                             'direccion' => $_POST['direccion'],
                             'telefono' => $_POST['telefono'],
                             'email' => $_POST['correo']);
                
                $res = ModeloCliente::mdlGuardarCliente($tabla, $data);
                if($res == 'ok'){
                    echo '<script>  
                    Swal.fire({
                        icon:"success",
                        title: "¡Datos de cliente guardados Correctamente...!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location= "cliente";
                        }
                    })
                  </script>';
                } else{
                    echo '<script>
                    Swal.fire({
                        icon:"error",
                        title: "¡Datos de cliente no se puden ser guardados...!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location= "cliente";
                        }
                    })
                  </script>';

                }
            }
    }
    //FUNCION PARA CARGAR DATOS DEL CLIENTE
    public static function crtlCargarClientes($parametro, $id){
        $tabla = "cliente";
        $datosClientes = ModeloCliente::mdlCargarClientes($tabla, $parametro, $id);
        return $datosClientes; 

    }

    //Funcion para actualixar datos
    public static function crtlActualizarCliente(){
        if (isset($_POST['modificar_cedula']) &&
        isset($_POST['modificar_nombre']) &&
        isset($_POST['modificar_apellidos']) &&
        isset($_POST['modificar_direccion']) &&
        isset($_POST['modificar_telefono']) &&
        isset($_POST['modificar_correo'])){
            $tabla ="cliente";
            $data = array('cedula' => $_POST['modificar_cedula'],
            'nombre' => $_POST['modificar_nombre'],
            'apellidos' => $_POST['modificar_apellidos'],
            'direccion' => $_POST['modificar_direccion'],
            'telefono' => $_POST['modificar_telefono'],
            'email' => $_POST['modificar_correo'],
            'id_cliente' => $_POST['id_cliente']);
            
            
            
                $res = ModeloCliente::mdlActualizarClientes($tabla, $data);

                if($res == 'ok'){
                    echo '<script>  
                    Swal.fire({
                        icon:"success",
                        title: "¡Datos del cliente actualizados Correctamente...!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location= "cliente";
                        }
                    })
                  </script>';
                } else{
                    echo '<script>
                    Swal.fire({
                        icon:"error",
                        title: "¡Datos de cliente no puden ser actualizados...!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location= "cliente";
                        }
                    })
                  </script>';
                

        }

    }
    }
    public static function ctrlEliminarClientes($id) {
    
        $tabla = "cliente"; 
        $datosCliente = ModeloCliente::mdlEliminarCliente($tabla, $id);
        return $datosCliente;
       }
    }
    
    