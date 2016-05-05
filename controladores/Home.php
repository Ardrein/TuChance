<?php

require_once'libs/Controlador.php';

class Home extends Controlador {
    /* private $parametros;
      public function setParametros($parametros){
      $this->parametros = $parametros;
  } */

  public function index() {
    $this->cargarVista("index");
}

public function imprimir() {
    print_r($this->parametros);
    echo "parametro=" . $this->parametros[0];

}

public function seleccionar(){
    $parametros;

}

public function registrar(){
    $parametros = array();
    $parametros["nombre"] = $_POST["nombre"];
    $parametros["username"] = $_POST["username"];
    $parametros["pass"] = sha1($_POST["pass"]);
    $parametros["pass2"] = sha1($_POST["pass2"]);
    $parametros["register_date"] = date('Y-m-d');
    $parametros["last_connection"] = date('Y-m-d');


    if ($parametros["pass"]  == $parametros["pass2"] ) {
        $usuario = $this->cargarModelo("Usuario");
        $insertar = $usuario->insertUsuarios($parametros);
        if($insertar){
            echo "Registrado exitosamente.";
             $this->cargarVista("index");
        }else{
            echo "Error al registrar.";
             $this->cargarVista("index");
        }
    }
}

public function login(){
    $parametros = array();
    $parametros["username"] = $_POST["username"];
    $parametros["pass"] = sha1($_POST["pass"]);

    $usuario = $this->cargarModelo("Usuario");
    $respuesta = $usuario->autenticar($parametros);
    if($respuesta!=null && $respuesta->rowCount()>0){
        setcookie("chsm","logedin",time()+3600,"/","localhost");
        setcookie("name",$parametros["username"] ,time()+3600,"/","localhost");
        header("Location: /chat");
        exit;
    }else{
        echo "login fallido";
        $this->cargarVista("index");
    }
}

public function logout(){
    setcookie("chsm","",time()-3600,"/","localhost");
    setcookie("name","",time()-3600,"/","localhost");
    header("Location: /chat");
    
}

}

?>