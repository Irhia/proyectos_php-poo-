<?php

class RepositorioCategoria {
	

	public static function obtener_todos($conexion) {

		$categoria = array();

		if (isset($conexion)) {

			try{
				include_once 'Categoria.inc.php';

				$sql = "SELECT * FROM categoria";

				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)) {
					foreach ($resultado as $fila) {
						$categoria[] = new Categoria(
							$fila['id'], $fila['nombre'], $fila['descripcion'],$fila['activo']);
								
						
						}

					}else {
						print "No hay categorías";
					}
			}
			 catch (PDOException $ex){
				print "ERROR" . $ex -> getMessage();
			}
		}
		return $categoria;
	}



	public static function insertar_categoria ($conexion, $categoria) {
		$categoria_insertado = false;

	//echo 'antes del insert RepositorioCategoria' . "<br>";
	//echo $categoria -> obtener_nombre() . "<br>";
	//echo $categoria -> obtener_descripcion() . "<br>";

		if (isset ($conexion)) {
			try{
				$sql = "INSERT INTO categoria (nombre, descripcion, activo) VALUES (:nombre, :descripcion,  0)";
				$sentencia = $conexion -> prepare($sql);


				
				$nombrecito=$categoria->obtener_nombre();
				//echo $nombrecito;
				//echo 'después de insertar 	RepositorioCategoria';


				$descripcion = $categoria -> obtener_descripcion();
				//echo $descripcion  . "RepositorioCategoria - insertar_categoria";


				//Para enlazar parámetro.
				$sentencia -> bindParam(':nombre', $nombrecito, PDO::PARAM_STR);
				$sentencia -> bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
				
				$categoria_insertado = $sentencia -> execute();

			}catch (PDOException $ex) {
				print "ERROR" . $ex ->  getMessage(); 
			}
		}
			return $categoria_insertado;
	}

	   public static function eliminar_cartegoria_enviada($conexion, $nombre) {
    	if (isset($conexion)) {
    		try {
    			

    			$sql1 = "DELETE FROM categoria WHERE nombre=:nombre";
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
				$sql= "SELECT * FROM categoria WHERE nombre= :nombre";

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


public static function actualizar_categoria($conexion, $nombre, $descripcion, $id) {
       
     if (isset($conexion)) {

        try {
                $sql = "UPDATE categoria SET nombre = :nombre, descripcion = :descripcion WHERE id= :id";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia -> bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
                $sentencia -> bindParam(':id', $id, PDO::PARAM_INT);

                $sentencia -> execute();
        
            } catch(PDOException $ex) {
                print 'ERROR ' . $ex -> getMessage();
			    }
    }

       
    }

    

public static function obtener_categoria_por_nombre($conexion, $nombre) {
        $categoria = null;
        
        if (isset($conexion)) {
            try {
                include_once 'Categoria.inc.php';
                
                $sql = "SELECT * FROM categoria WHERE nombre = :nombre";
                
                $sentencia = $conexion -> prepare($sql);
                

                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                
                $sentencia -> execute();
                
                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $categoria = new Categoria($resultado['id'],
                            $resultado['nombre'],
                            $resultado['descripcion'], $resultado['activo']);
                } 
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        
        return $categoria;
    }

public static function obtener_categoria_por_id($conexion, $id) {
        $cat = null;
        
        if (isset($conexion)) {
            try {
                include_once 'Categoria.inc.php';
                
                $sql = "SELECT * FROM categoria WHERE id = :id";
                
                $sentencia = $conexion -> prepare($sql);
                
                $sentencia -> bindParam(':id', $id, PDO::PARAM_STR);
                
                $sentencia -> execute();
                
                $resultado = $sentencia -> fetch();
                
                if (!empty($resultado)) {
                    $cat = new Categoria($resultado['id']);
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        
        return $cat;
    }


}

?>
