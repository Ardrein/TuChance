<?php
<<<<<<< HEAD

require_once 'libs/Controlador.php';

	if(isset($_POST['go'])){ // button name
=======
//PHP encargado de obtener todos los libros
//para ello es enecesario importar nuestro modelo llamado libro.
require_once 'libs/Controlador.php';

if(isset($_POST['go'])){ // button name
>>>>>>> origin/master
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
<<<<<<< HEAD
	             cargarVista("login");
	           
	        }else{

=======
	            echo "Registrado exitosamente.";
	             cargarVista("login");
	        }else{
	            echo "Error al registrar.";
>>>>>>> origin/master
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