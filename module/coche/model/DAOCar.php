<?php
    // include("model/connect.php");

	// $path = $_SERVER['DOCUMENT_ROOT'] . '8_MVC_CRUD';
    include('C:\xampp\htdocs\8_MVC_CRUD\model\connect.php');
    
	class DAOCar{
	
		function insert_car($datos){
			// die('<script>console.log('.json_encode( $data ) .');</script>');
			$numero_licencia=$datos['numero_licencia'];
        	$marca=$datos['marca'];
        	$modelo=$datos['modelo'];
        	$matricula=$datos['matricula'];
        	$km=$datos['km'];
        	$categoria=$datos['categoria'];
        	$tipo=$datos['tipo'];
        	$comentarios=$datos['comentarios'];
			$fecha_de_alta=$datos['fecha_de_alta'];
			$color=$datos['color'];
			$extras = '';
			foreach ($datos['extras'] as $indice) {
        	    $extras = $extras."$indice:";
        	}
			$imagen_coche=$datos['imagen_coche'];
			$pecio=$datos['precio'];
			$puertas=$datos['puertas'];
			$ciudad=$datos['ciudad'];
			$latitud=$datos['latitud'];
			$longitud=$datos['longitud'];

        	$sql = " INSERT INTO cars (numero_licencia, marca, modelo, matricula, km, categoria, tipo, comentarios, fecha_de_alta, color, extras, imagen_coche, precio, puertas, ciudad, latitud, longitud )
			VALUES ('$numero_licencia','$marca','$modelo','$matricula','$km','$categoria','$tipo','$comentarios','$fecha_de_alta','$color','$extras','$imagen_coche','$precio','$puertas','$ciudad','$latitud','$longitud')";
            
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
			return $res;
		}
		
		function select_all_car(){
			$sql = "SELECT * FROM cars ORDER BY id ASC";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
			connect::close($conexion);
			// $data = 'hola DAO select_all_car';
            // die('<script>console.log('.json_encode( $data ) .');</script>');
            return $res;
		}
		
		function select_car($id){
			$sql = "SELECT * FROM cars WHERE id='$id'";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            connect::close($conexion);
            return $res;
		}

		function select_car_matricula($matricula){
			$sql = "SELECT * FROM cars WHERE matricula='$matricula'";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            connect::close($conexion);
            return $res;
		}
		
		function update_car($datos){
			
			$numero_licencia=$datos['numero_licencia'];
        	$marca=$datos['marca'];
        	$modelo=$datos['modelo'];
        	$matricula=$datos['matricula'];
        	$km=$datos['km'];
        	$categoria=$datos['categoria'];
        	$tipo=$datos['tipo'];
        	$comentarios=$datos['comentarios'];
			$fecha_de_alta=$datos['fecha_de_alta'];
			$color=$datos['color'];
			$extras = '';
			foreach ($datos['extras'] as $indice) {
        	    $extras = $extras."$indice:";
        	}
			$imagen_coche=$datos['imagen_coche'];
			$precio=$datos['precio'];
			$puertas=$datos['puertas'];
			$ciudad=$datos['ciudad'];
			$latitud=$datos['latitud'];
			$longitud=$datos['longitud'];
        	
        	$sql = "UPDATE cars SET numero_licencia='$numero_licencia', marca='$marca', modelo='$modelo'
			, matricula='$matricula', km='$km', categoria='$categoria', tipo='$tipo', comentarios='$comentarios', fecha_de_alta='$fecha_de_alta'
			, color='$color', extras='$extras', imagen_coche='$imagen_coche', precio='$precio', puertas='$puertas', ciudad='$ciudad'
			, latitud='$latitud', longitud='$longitud' WHERE numero_licencia='$numero_licencia'";
            
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
			return $res;
		}
		
		function delete_car($id){
			$sql = "DELETE FROM cars WHERE id='$id'";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
		}

		function delete_all_car(){
			$sql = "DELETE FROM cars";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);

            return $res;
		}

		function dummies_cars(){
			$sql = "DELETE FROM cars;";

			$sql.= "INSERT INTO cars (numero_licencia, marca, modelo, matricula, km, categoria, tipo, comentarios, fecha_de_alta, color, extras, imagen_coche, precio, puertas, ciudad, latitud, longitud)" 
			." VALUES ('1W2D50JIL04J3L5K1', 'BMW', 'I4', '4567DAB', '0', 'ET','Gasolina', 'Coche nuevo y automático', '15/01/2022', 'Azul', 'Navegador', 'mercedes_glc_coupe.jpg' , '50000', '4' , 'Ontinyent' , '-1', '1.0324');";
			
			$sql.= "INSERT INTO cars (numero_licencia, marca, modelo, matricula, km, categoria, tipo, comentarios, fecha_de_alta, color, extras, imagen_coche, precio, puertas, ciudad, latitud, longitud)" 
			." VALUES ('2OUD50JIL04J3L5G6', 'CP', 'Formentor', '7645JDH', '10000', 'GS', 'Gasolina', 'Coche nuevo y automático', '26/07/2019', 'Rojo', 'Navegador', 'mercedes_glc_coupe.jpg', '32000', '5', 'Ontinyent' , '-1', '1.0324');";

			$sql.= "INSERT INTO cars (numero_licencia, marca, modelo, matricula, km, categoria, tipo, comentarios, fecha_de_alta, color, extras, imagen_coche, precio, puertas, ciudad, latitud, longitud)" 
			." VALUES ('8P9D50JIL04J3L1H7', 'FRD', 'Mustang', '6547LGM', '2000', 'ET', 'Gasolina', 'Coche nuevo y automático', '30/03/2019', 'Amarillo', 'Camara Trasera', 'mercedes_glc_coupe.jpg' , '39000', '5', 'Ontinyent' , '-1', '1.0324');";

			$sql.= "INSERT INTO cars (numero_licencia, marca, modelo, matricula, km, categoria, tipo, comentarios, fecha_de_alta, color, extras, imagen_coche, precio, puertas, ciudad, latitud, longitud)" 
			." VALUES ('44GD50JIL04J3LH58', 'MCD', 'GLC Coupé', '9745DFM', '0', 'OT', 'Gasolina', 'Coche nuevo y automático', '26/07/2019', 'Negro', 'Navegador', 'mercedes_glc_coupe.jpg' ,'60000', '5' , 'Ontinyent' , '-1', '1.0324');";

			$sql.= "INSERT INTO cars (numero_licencia, marca, modelo, matricula, km, categoria, tipo, comentarios, fecha_de_alta, color, extras, imagen_coche, precio, puertas, ciudad, latitud, longitud)" 
			." VALUES ('3J4750JIL04J3LKP4', 'AUD', 'A6', '2641FKL', '50000', 'HB', 'Gasolina', 'Coche nuevo y automático', '20/06/2017', 'Blanco', 'Navegador', 'mercedes_glc_coupe.jpg' , '28000', '4' , 'Ontinyent' , '-1', '1.0324')";
			
			$conexion = connect::con();
            $res = mysqli_multi_query($conexion, $sql);
            connect::close($conexion);

            return $res;
		}
	}