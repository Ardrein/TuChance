<?php

require_once '/libs/Modelo.php';

class Usuario extends Modelo{
	function __construct(){
           
		parent::__construct();
		$this->setNombreTabla("users");
                
	}

	function selectUsuarios($parametros){
			
		return $this->selectDinamico($parametros);
	}

	function deleteUsuarios($parametros){
			
		return $this->deleteDinamico($parametros);
	}

	function insertUsuarios($parametros){
			
		return $this->insertDinamico($parametros);
	}

	function updateUsuarios($parametros,$valores){
			
		return $this->updateDinamico($parametros);
	}


	function autenticar($parametros){

		return $this->selectDinamico($parametros);
	}
        
        

}



?>