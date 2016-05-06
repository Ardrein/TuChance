<?php

class Modelo {

    protected $nombreTabla = "";
    protected $conexion = "";

    public function Modelo() {
        $host = "localhost";
        $db_name = "chat";
        $username = "root";
        $password = "";



        try {

            $this->conexion = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
        } catch (PDOException $exception) {
            echo "Connection error" . $exception->getMessage();
        }
    }

    
    protected function selectDinamico($parametros) {
            $query = "SELECT * FROM ".$this->nombreTabla." WHERE id IS NOT NULL ";

            if(!empty($parametros)){
                if(isset($parametros['nombre']) || array_key_exists('nombre', $parametros)){
                    $query .= " AND nombre = '".$parametros['nombre']."'";
                }

                if(isset($parametros['username']) || array_key_exists('username', $parametros)){
                 $query .= " AND username = '".$parametros['username']."'";
                }

                if(isset($parametros['pass']) || array_key_exists('pass', $parametros)){
                   $query .= " AND pass = '".$parametros['pass']."'";
                }

                if(isset($parametros['register_date']) || array_key_exists('register_date', $parametros)){
                    $query .= " AND register_date = '".$parametros['register_date']."'";
                }

                if(isset($parametros['last_connection']) || array_key_exists('last_connection', $parametros)){
                    $query .= " AND last_connection = '".$parametros['last_connection']."'";
                }

            return $this->conexion->query($query);
        }
    
}

    protected function deleteDinamico($parametros) {
        $query = "DELETE FROM " . $this->nombreTabla." WHERE id IS NOT NULL";

        if(!empty($parametros)){
            if(isset($parametros['nombre']) || array_key_exists('nombre', $parametros)){
                $query .= " AND nombre = :nombre";
            }

            if(isset($parametros['username']) || array_key_exists('username', $parametros)){
                $query .= " AND username = :username";
            }

            if(isset($parametros['pass']) || array_key_exists('pass', $parametros)){
                $query .= " AND pass = :pass ";
            }

            if(isset($parametros['register_date']) || array_key_exists('register_date', $parametros)){
                $query .= " AND register_date = :register_date ";
            }

            if(isset($parametros['last_connection']) || array_key_exists('last_connection', $parametros)){
                $query .= " AND last_connection = :last_connection ";
            }

            $stmt = $this->conexion->prepare($query);

            if(isset($parametros['nombre']) || array_key_exists('nombre', $parametros)){
                $stmt->bindValue(':nombre', $parametros['nombre']);
            }

            if(isset($parametros['username']) || array_key_exists('username', $parametros)){
                $stmt->bindValue(':username', $parametros['username']);
            }

            if(isset($parametros['pass']) || array_key_exists('pass', $parametros)){
                $stmt->bindValue(':pass', $parametros['pass']);
            }

            if(isset($parametros['register_date']) || array_key_exists('register_date', $parametros)){
                $stmt->bindValue(':register_date', $parametros['register_date']);
            }

            if(isset($parametros['last_connection']) || array_key_exists('last_connection', $parametros)){
                $stmt->bindValue(':last_connection', $parametros['last_connection']);
            }


            return $this->execute($stmt);
        }else{
            return false;
        }


}

protected function insertDinamico($parametros) {
        $query = "INSERT INTO " . $this->nombreTabla;

        if(!empty($parametros)){
            $columns = array();
            $columns2 = array();
            if(isset($parametros['nombre']) || array_key_exists('nombre', $parametros)){
                $columns[] = "nombre";
                $columns2[] = ":nombre";
            }

            if(isset($parametros['username']) || array_key_exists('username', $parametros)){
               $columns[] = "username";
               $columns2[] = ":username";
           }

           if(isset($parametros['pass']) || array_key_exists('pass', $parametros)){
               $columns[] = "pass";
               $columns2[] = ":pass";
           }

           if(isset($parametros['register_date']) || array_key_exists('register_date', $parametros)){
            $columns[] = "register_date";
            $columns2[] = ":register_date";
        }

        if(isset($parametros['last_connection']) || array_key_exists('last_connection', $parametros)){
         $columns[] = "last_connection";
         $columns2[] = ":last_connection";
     }

     if(sizeof($columns)>0){
        $query .= " (".implode(', ', $columns).") VALUES (".implode(', ', $columns2).")";
    }

    $stmt = $this->conexion->prepare($query);

    if(isset($parametros['nombre']) || array_key_exists('nombre', $parametros)){
        $stmt->bindValue(':nombre', $parametros['nombre'], PDO::PARAM_STR);
    }

    if(isset($parametros['username']) || array_key_exists('username', $parametros)){
        $stmt->bindValue(':username', $parametros['username'], PDO::PARAM_STR);
    }

    if(isset($parametros['pass']) || array_key_exists('pass', $parametros)){
        $stmt->bindValue(':pass', $parametros['pass'], PDO::PARAM_STR);
    }

    if(isset($parametros['register_date']) || array_key_exists('register_date', $parametros)){
        $stmt->bindValue(':register_date', $parametros['register_date'], PDO::PARAM_STR);
    }

    if(isset($parametros['last_connection']) || array_key_exists('last_connection', $parametros)){
        $stmt->bindValue(':last_connection', $parametros['last_connection'], PDO::PARAM_STR);
    }


    

    return $this->execute($stmt);
}else{
    return false;
}



}

protected function updateDinamico($parametros,$valores) {
    $query = "UPDATE " . $this->nombreTabla." SET ";

    if(!empty($parametros)){
        $columns = array();
        $columns2 = array();

        //valores del set
        if(isset($valores['nombre']) || array_key_exists('nombre', $valores)){
            $columns2[] = "nombre = :nombre2";
        }

        if(isset($valores['username']) || array_key_exists('username', $valores)){
           $columns2[] = "username = :username2";
       }

       if(isset($valores['pass']) || array_key_exists('pass', $valores)){
           $columns2[] = "pass = :pass2";
       }

       if(isset($valores['register_date']) || array_key_exists('register_date', $valores)){
        $columns2[] = "register_date = :register_date2";
        }

        if(isset($valores['last_connection']) || array_key_exists('last_connection', $valores)){
         $columns2[] = "last_connection = :last_connection2";
        }
        //parametros del where

        if(isset($parametros['nombre']) || array_key_exists('nombre', $parametros)){
            $columns[] = "nombre = :nombre";
        }

        if(isset($parametros['nombre']) || array_key_exists('nombre', $parametros)){
           $columns[] = "username = :username";
       }

       if(isset($parametros['nombre']) || array_key_exists('nombre', $parametros)){
           $columns[] = "pass = :pass";
       }

       if(isset($parametros['nombre']) || array_key_exists('nombre', $parametros)){
        $columns[] = "register_date = :register_date";
        }

        if(isset($parametros['nombre']) || array_key_exists('nombre', $parametros)){
         $columns[] = "last_connection = :last_connection";
        }


         if(sizeof($columns)>0){
          $query .= implode(', ', $columns2)." WHERE ".implode(' AND ', $columns);
        }


        $stmt = $this->conexion->prepare($query);


        if(isset($parametros['nombre']) || array_key_exists('nombre', $parametros)){
         $stmt->bindValue(':nombre', $parametros['nombre']);
        }

        if(isset($parametros['nombre']) || array_key_exists('nombre', $parametros)){
            $stmt->bindValue(':username', $parametros['username']);
        }

        if(isset($parametros['nombre']) || array_key_exists('nombre', $parametros)){
           $stmt->bindValue(':pass', $parametros['pass']);
        }

        if(isset($parametros['nombre']) || array_key_exists('nombre', $parametros)){
            $stmt->bindValue(':register_date', $parametros['register_date']);
        }

        if(isset($parametros['nombre']) || array_key_exists('nombre', $parametros)){
           $stmt->bindValue(':last_connection', $parametros['last_connection']);
        }

        if(isset($valores['nombre']) || array_key_exists('nombre', $valores)){
         $stmt->bindValue(':nombre2', $valores['nombre']);
        }

        if(isset($valores['username']) || array_key_exists('username', $valores)){
            $stmt->bindValue(':username2', $valores['username']);
        }

        if(isset($valores['pass']) || array_key_exists('pass', $valores)){
           $stmt->bindValue(':pass2', $valores['pass']);
        }

        if(isset($valores['register_date']) || array_key_exists('register_date', $valores)){
            $stmt->bindValue(':register_date2', $valores['register_date']);
        }

        if(isset($valores['last_connection']) || array_key_exists('last_connection', $valores)){
           $stmt->bindValue(':last_connection2', $valores['last_connection']);
        }


return $this->execute($stmt);
}else{
    return false;
}


}

public function query($query) {
    return $this->conexion->query($query);
}

public function execute($stmt){
    return $stmt->execute();
}

public function getNombreTabla() {
    return $this->nombreTabla;
}

public function setNombreTabla($nombreTabla) {
    $this->nombreTabla = $nombreTabla;
}

public function getConexion() {
    return $this->conexion;
}

public function setConexion($conexion) {
    $this->conexion = $conexion;
}

}

?>