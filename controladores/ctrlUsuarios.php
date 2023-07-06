<?php
require_once("modelos/mdlUsuarios.php");
class ControladorUsuario{
    public function ctrlIngresar(){
        if(isset($_POST['g-recaptcha-response'])){
            $ip = $_SERVER["REMOTE_ADDR"];
            $captcha = $_POST["g-recaptcha-response"];
            $secretkey = "6Lcel5QmAAAAAKvaTdEU59PTXnbcPirW0XQ7e5a-";
            $request = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");
            $atributos = json_decode($request, TRUE);
        if(isset($_POST['usuario']) && isset($_POST['password']) && $atributos["success"]){
            $username = $_POST['usuario'];
            $password = $_POST['password'];
            $res = ModeloUsuarios::mdlEntrar($username, $password);
            if (isset($res["usuario"]) && 
            $res["usuario"]==$username && 
            isset($res["password"]) &&
            $res["password"] == $password){
                $_SESSION['login'] = 'activa';
                echo "<script>
                Swal.fire(
                    'Good job!',
                    'You clicked the button!',
                    'success'
                  )
							window.location.href='inicio';
						  </script>";
            }else{
                
            }
        }
    }
}
}