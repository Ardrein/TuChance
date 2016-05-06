<?php

require_once 'libs/Controlador.php';

	if(isset($_POST['login'])){ // button name
		    $parametros = array();
		    $parametros["username"] = $_POST["username"];
		    $parametros["pass"] = sha1($_POST["pass"]);

		    $usuario = cargarModelo("Usuario");
		    $respuesta = $usuario->autenticar($parametros);
		    if($respuesta!=null && $respuesta->rowCount()>0){
		        setcookie("chsm","logedin",time()+3600,"/","localhost");
		        setcookie("name",$parametros["username"] ,time()+3600,"/","localhost");
		        header("Location: /index.html");
		        exit;
		    }else{
		        cargarVista("index");
		    }
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