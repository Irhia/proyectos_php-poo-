<?php

class RepositorioAnuncio {
	

	public static function obtener_todos($conexion) {

		$categoria = array();

		if (isset($conexion)) {

			try{
				include_once 'Anuncio.inc.php';

				$sql = "SELECT * FROM anuncios";

				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)) {
					foreach ($resultado as $fila) {
						$anuncio[] = new Anuncio(
							$fila['id'], $fila['titulo'], $fila['descripcion'], $fila['url'], $fila['foto'], $fila['precio_venta'],
							$fila['precio_chollo'], $fila['precio_correcto'], $fila['valoracion_admin'], $fila['id_usuario'], $fila['id_categoria'],
							$fila['id_sitio_web']);
								
						
						}

					}else {
						print "No hay anuncios";
					}
			}
			 catch (PDOException $ex){
				print "ERROR" . $ex -> getMessage();
			}
		}
		return $anuncio;
	}

public static function obtener_todos_desc($conexion) {

		$categoria = array();

		if (isset($conexion)) {

			try{
				include_once 'Anuncio.inc.php';

				$sql = "SELECT * FROM anuncios order by id desc";

				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)) {
					foreach ($resultado as $fila) {
						$anuncio[] = new Anuncio(
							$fila['id'], $fila['titulo'], $fila['descripcion'], $fila['url'], $fila['foto'], $fila['precio_venta'],
							$fila['precio_chollo'], $fila['precio_correcto'], $fila['valoracion_admin'], $fila['id_usuario'], $fila['id_categoria'],
							$fila['id_sitio_web']);
								
						
						}

					}else {
						print "No hay anuncios";
					}
			}
			 catch (PDOException $ex){
				print "ERROR" . $ex -> getMessage();
			}
		}
		return $anuncio;
	}


	public static function insertar_anuncio ($conexion, $anuncio, $usuario, $id_cat, $id_sw) {
		$anuncio_insertado = false;

	//echo 'antes del insert RepositorioCategoria' . "<br>";
	//echo $categoria -> obtener_nombre() . "<br>";
	//echo $categoria -> obtener_descripcion() . "<br>";

		if (isset ($conexion)) {
			try{
				$sql = "INSERT INTO anuncios (titulo, descripcion, url, foto, p_venta, p_chollo,
				       p_correcto, valoracion, id_usuario, id_categoria, id_sitio_web)
				       VALUES (:titulo, :descripcion, :url, :foto, :p_venta, p_chollo,
				       :p_correcto, :valoracion, :id_usuario, :id_categoria, :id_sitio_web)";
				$sentencia = $conexion -> prepare($sql);


				
				$titulo=$anuncio->obtener_titulo();
				//echo $nombrecito;
				//echo 'después de insertar 	RepositorioCategoria';
				$descripcion = $anuncio -> obtener_descripcion();
				//echo $descripcion  . "RepositorioCategoria - insertar_categoria";


				$url = $anuncio -> obtener_url();
				$foto = $anuncio -> obtener_foto();
				$p_venta = $anuncio -> obtener_p_venta();
				$p_chollo = $anuncio -> obtener_p_chollo();
				$p_correcto = $anuncio -> obtener_p_correcto();
				$valoracion = $anuncio -> obtener_valoracion();
				$id_usuario = $usuario;
				$id_categoria = $id_cat;
				$id_sitio_web = $id_sw;
				
				//Para enlazar parámetro.
				$sentencia -> bindParam(':titulo', $titulo, PDO::PARAM_STR);
				$sentencia -> bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
				$sentencia -> bindParam(':foto', $foto, PDO::PARAM_STR);
				$sentencia -> bindParam(':p_venta', $p_venta, PDO::PARAM_STR);
				$sentencia -> bindParam(':p_chollo', $p_chollo, PDO::PARAM_STR);
				$sentencia -> bindParam(':p_correcto', $p_correcto, PDO::PARAM_STR);
				$sentencia -> bindParam(':valoracion', $valoracion, PDO::PARAM_STR);
				$sentencia -> bindParam(':id_usuario', $usuario, PDO::PARAM_STR);
				$sentencia -> bindParam(':id_categoria', $id_cat, PDO::PARAM_STR);
				$sentencia -> bindParam(':id_sitio_web', $id_sw, PDO::PARAM_STR);
				

				
				$anuncio_insertado = $sentencia -> execute();

			}catch (PDOException $ex) {
				print "ERROR" . $ex ->  getMessage(); 
			}
		}
			return $anuncio_insertado;
	}

	   public static function eliminar_anuncio($conexion, $id) {
    	if (isset($conexion)) {
    		try {
    			

    			$sql1 = "DELETE FROM anuncio WHERE id=:nombre";
    			$sentencia1 = $conexion -> prepare($sql1);
    			$sentencia1 -> bindParam(':id', $id, PDO::PARAM_INT);
    			$sentencia1 -> execute();

    			
    		} catch (PDOException $ex) {
    			print 'ERROR' . $ex -> getMessage();
    			$conexion -> rollBack();
    		}
    	}
    }



	public static function titulo_hay ($conexion, $titulo){
		$titulo_hay = true;

		if(isset($conexion)){
			try{
				$sql= "SELECT * FROM anuncios WHERE titulo= :titulo";

				$sentencia= $conexion -> prepare($sql);
				$sentencia -> bindParam (':titulo', $titulo , PDO::PARAM_STR);
				$sentencia -> execute();

				$resultado = $sentencia -> fetchAll();

					if (count($resultado)){
						$titulo_hay = true;
					} else {
						$titulo_hay = false;
				  	 }

				} catch (PDOException $ex){
					print "ERROR" . $ex ->  getMessage(); 
			}
		}

			return $titulo_hay;
	}


public static function actualizar_anuncio($conexion, $titulo, $descripcion, $url, $foto, $p_venta,
					 $p_chollo, $p_correcto, $valoracion, $id_usuario, $id_categoria, $id_sitio_web, $id) {
       
     if (isset($conexion)) {

        try {
                $sql = "UPDATE anuncios SET titulo = :titulo, descripcion = :descripcion, url = :url, foto = :foto,
                		p_venta = :p_venta, p_chollo = :p_chollo, p_correcto = :p_correcto, valoracion = :valoracion,
                		id_usuario = :id_usuario, id_categoria = :id_categoria, id_sitio_web = :id_sitio_web WHERE id= :id";

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':titulo', $titulo, PDO::PARAM_STR);
                $sentencia -> bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
                $sentencia -> bindParam(':titulo', $titulo, PDO::PARAM_STR);
				$sentencia -> bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
				$sentencia -> bindParam(':foto', $foto, PDO::PARAM_STR);
				$sentencia -> bindParam(':p_venta', $p_venta, PDO::PARAM_STR);
				$sentencia -> bindParam(':p_chollo', $p_chollo, PDO::PARAM_STR);
				$sentencia -> bindParam(':p_correcto', $p_correcto, PDO::PARAM_STR);
				$sentencia -> bindParam(':valoracion', $valoracion, PDO::PARAM_STR);
				$sentencia -> bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);
				$sentencia -> bindParam(':id_categoria', $id_categoria, PDO::PARAM_STR);
				$sentencia -> bindParam(':id_sitio_web', $id_sitio_web, PDO::PARAM_STR);
                $sentencia -> bindParam(':id', $id, PDO::PARAM_INT);

                $sentencia -> execute();
        
            } catch(PDOException $ex) {
                print 'ERROR ' . $ex -> getMessage();
			    }
    }

       
}


public static function obtener_anuncio_cat($conexion, $id) {
        $cat = null;
        
        if (isset($conexion)) {
            try {
                include_once 'Categoria.inc.php';
                
                $sql = "SELECT * FROM categoria WHERE id_categoria = :id order by precio_venta asc";
                
                $sentencia = $conexion -> prepare($sql);
                
                $sentencia -> bindParam(':id', $id, PDO::PARAM_STR);
                
                $sentencia -> execute();
                
                $resultado = $sentencia -> fetchAll();
                if (count($resultado)) {
					foreach ($resultado as $fila) {
						$categoria[] = new Categoria(
							$fila['foto'], $fila['precio'], $fila['descripcion']);
							}					

					}else {
						print "No hay";
					}
			}
			 catch (PDOException $ex){
				print "ERROR" . $ex -> getMessage();
			}
		}
		return $categoria;
	}
                

}

?>
