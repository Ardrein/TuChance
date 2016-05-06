<?php

require_once 'libs/Controlador.php';

	if(isset($_POST['go'])){ // button name
		$parametros = array();
	    $parametros["nombre"] = $_POST["nombre"];
	    $parametros["username"] = $_POST["username"];
	    $parametros["pass"] = sha1($_POST["pass"]);
	    $parametros["pass2"] = sha1($_POST["pass2"]);
	    $parametros["register_date"] = date('Y-m-d');
	    $parametros["last_connection"] = date('Y-m-d');
	    if ($parametros["pass"]  == $parametros["pass2"] ) {
	        $usuario = cargarModelo("Usuario");
	        $insertar = $usuario->insertUsuarios($parametros);
	        if($insertar){
	             cargarVista("login");
	           
	        }else{

	             cargarVista("login");
	        }
	    }
	}else{
	echo ('ERROR AL registrar');
	}


	function cargarModelo($modelo){
		$modelo = ucfirst(strtolower($modelo));
		$urlFile = 'modelos/'.$modelo.'.php';
		if(file_exists($urlFile)){
			include $urlFile;
			$class = $modelo;
			$model = new $class();
			return $model;
		}else{
			return null;
		}
	}

	function cargarVista($vista){
		$vista = ucfirst(strtolower($vista));

		$urlFile = ''.$vista.'.html';

		if(file_exists($urlFile)){
		  require_once($urlFile);

			return true;
		}else{
			return false;
		}
	}
?>