<?php

class RepositorioSW {
	

	public static function obtener_todos($conexion) {

		$sw = array();

		if (isset($conexion)) {

			try{
				include_once 'SW.inc.php';

				$sql = "SELECT * FROM sitios_web";

				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)) {
					foreach ($resultado as $fila) {
						$sw[] = new Sitios_Web(
							$fila['id'], $fila['nombre'], $fila['descripcion'],$fila['url']);
						echo $fila['id'];
						}
					}else {
						print "No hay Servicios Web";
					}
			}
			 catch (PDOException $ex){
				print "ERROR" . $ex -> getMessage();
			}
		}
		return $sw;
	}



	public static function insertar_sw ($conexion, $sw) {
		$sw_insertado = false;


		if (isset ($conexion)) {
			try{
				$sql = "INSERT INTO sitios_web (nombre, descripcion, url) VALUES (:nombre, :descripcion, :url)";
				$sentencia = $conexion -> prepare($sql);

				$nombrecito=$sw->obtener_nombre();
				$descripcion = $sw -> obtener_descripcion();
				$url = $sw -> obtener_url();
				
				//Para enlazar parámetro.
				$sentencia -> bindParam(':nombre', $nombrecito, PDO::PARAM_STR);
				$sentencia -> bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
				$sentencia -> bindParam(':url', $url, PDO::PARAM_STR);


				$sw_insertado = $sentencia -> execute();

			}catch (PDOException $ex) {
				print "ERROR" . $ex ->  getMessage(); 
			}
		}
			return $sw_insertado;
	}

	   public static function eliminar_sw($conexion, $nombre) {
    	if (isset($conexion)) {
    		try {
    			

    			$sql1 = "DELETE FROM sitios_web WHERE nombre=:nombre";
    			$sentencia1 = $conexion -> prepare($sql1);
    			$sentencia1 -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
    			$sentencia1 -> execute();

    			
    		} catch (PDOException $ex) {
    			print 'ERROR' . $ex -> getMessage();
    			$conexion -> rollBack();
    		}
    	}
    }

	public static function nombre_existe($conexion, $nombre){
		$nombre_existe = true;

		if(isset($conexion)){
			try{
				$sql= "SELECT * FROM sitios_web WHERE nombre= :nombre";

				$sentencia= $conexion -> prepare($sql);
				$sentencia -> bindParam (':nombre', $nombre , PDO::PARAM_STR);
				$sentencia -> execute();

				$resultado = $sentencia -> fetchAll();

					if (count($resultado)){
						$nombre_existe = true;
					} else {
						$nombre_existe = false;
				  	 }

				} catch (PDOException $ex){
					print "ERROR" . $ex ->  getMessage(); 
			}
		}

			return $nombre_existe;
	}


public static function actualizar_sw($conexion, $nombre, $descripcion, $url, $id) {
       
     if (isset($conexion)) {

        try {
                $sql = "UPDATE sitios_web SET nombre = :nombre, descripcion = :descripcion , url =:url WHERE id= :id";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia -> bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
                $sentencia -> bindParam(':id', $id, PDO::PARAM_INT);
  				$sentencia -> bindParam(':url', $url, PDO::PARAM_STR);
                
                $sentencia -> execute();
        
            } catch(PDOException $ex) {
                print 'ERROR ' . $ex -> getMessage();
			    }
    }

       
}


public static function obtener_sw_por_nombre($conexion, $nombre) {
        $sw = null;
        
        if (isset($conexion)) {
            try {
                include_once 'SW.inc.php';
                
                $sql = "SELECT * FROM sitios_web WHERE nombre = :nombre";
                
                $sentencia = $conexion -> prepare($sql);
                

                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                
                $sentencia -> execute();
                
                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $s_wb = new Categoria($resultado['id'],
                            $resultado['nombre'],
                            $resultado['descripcion'],
                            $resultado['url'])
                    		;
                } 
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        
        return $s_wb;
    }


}

?>
