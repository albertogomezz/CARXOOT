<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/CARXOOT/';
include($path . "/model/connect.php");

class DAOShop{
	function select_all_cars($items,$total_items){
		
		$sql = "SELECT * 
			FROM car c, model m
			WHERE c.model = m.id_model 
			ORDER BY c.count DESC
			LIMIT $total_items, $items;";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);

		$retrArray = array();
		if (mysqli_num_rows($res) > 0) {
			while ($row = mysqli_fetch_assoc($res)) {
				$retrArray[] = $row;
			}
		}
		return $retrArray;
	}

	function select_one_car($id){

		$sql = "SELECT *
		FROM car c, brand b, model m, bodywork bo, type_motor ty
		WHERE c.id_car = '$id'
		AND m.brand = b.id_brand
		AND c.model = m.id_model
		AND c.bodywork = bo.id_bodywork
		AND c.motor = ty.cod_tmotor;";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql)->fetch_object();
		connect::close($conexion);

		return $res;
	}

	function select_imgs_car($img_car){
		
		$sql = "SELECT *
		FROM cars_img ca, car c 
		WHERE c.id_car = ca.cod_car AND id_car = '$img_car'";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);

		$imgArray = array();
		if (mysqli_num_rows($res) > 0) {
			foreach ($res as $row) {
				array_push($imgArray, $row);
			}
		}
		return $imgArray;
	}

	function filters($filter,$items,$total_items){

		// echo json_encode($filter);
        // exit;

		// return $filter;

		// echo json_encode($filter);
        // exit;

        $consulta = " SELECT c.* 
		FROM (SELECT * 
		FROM car c, brand b, model m, bodywork bo, type_motor ty
		WHERE m.brand = b.id_brand
		AND c.model = m.id_model
		AND c.bodywork = bo.id_bodywork
		AND c.motor = ty.cod_tmotor) AS c ";
        
			for ($i=0; $i < count($filter); $i++){
                if ($i==0){
					if ($filter[$i][0] == 'order'){
                        $consulta.= " ORDER BY " . $filter[$i][1] . " DESC";
					} else {
                    $consulta.= " WHERE c." . $filter[$i][0] . "= '" . $filter[$i][1] ."'";
					}
                }else {
					if ($filter[$i][0] == 'order'){
					$consulta.= " ORDER BY " . $filter[$i][1] . " DESC";
					} else {
                    $consulta.= " AND c." . $filter[$i][0] . "= '" . $filter[$i][1] ."'";
					}
                }
			}
		
		$consulta.= " LIMIT $total_items, $items;";

		// echo json_encode($consulta);
		// exit;

        $conexion = connect::con();
        $res = mysqli_query($conexion, $consulta);
        connect::close($conexion);

        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }
	
	function contador($id){

		// echo json_encode($id);
        // exit;

		$sql = "UPDATE car c
		SET c.count = c.count + 1
		WHERE c.id_car = '$id'";

		// echo json_encode($sql);
		// exit;

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);
		
        return $res;
	}

	function count_more_cars_related($brand, $id_car){

		$sql = "SELECT COUNT(*) AS n_prod
		FROM car c , model m, brand b 
		WHERE c.model = m.id_model 
		AND m.brand = b.id_brand
		AND c.id_car NOT LIKE '$id_car'
		AND b.name_brand = '$brand'";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);

		$retrArray = array();
		if (mysqli_num_rows($res) > 0) {
			while ($row = mysqli_fetch_assoc($res)) {
				$retrArray[] = $row;
			}
		}
		return $retrArray;
	}

	function select_cars_related($brand,$id_car,$items,$total){
		$sql = "SELECT * 
		FROM car c, model m, brand b 
		WHERE c.model = m.id_model
		AND m.brand = b.id_brand
		AND c.id_car NOT LIKE '$id_car'
		AND b.name_brand = '$brand'
		LIMIT $items, $total";
		// LIMIT $loaded, $items";

		// echo json_encode($sql);
		// exit;

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);

		
		$retrArray = array();
		if (mysqli_num_rows($res) > 0) {
			while ($row = mysqli_fetch_assoc($res)) {
				$retrArray[] = $row;
			}
		}
		return $retrArray;
	}

	function select_count_all(){

		// echo json_encode("hola");
		// exit;

		$sql = "SELECT COUNT(*) AS n_prod 
		FROM car";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);

		$retrArray = array();
		if (mysqli_num_rows($res) > 0) {
			while ($row = mysqli_fetch_assoc($res)) {
				$retrArray[] = $row;
			}
		}
		return $retrArray;
	}

	function select_count_home($filter){

		// echo json_encode("hola");
		// exit;

		$sql = " SELECT COUNT(*) AS n_prod
		FROM (SELECT * 
		FROM car c, brand b, model m, bodywork bo, type_motor ty
		WHERE m.brand = b.id_brand
		AND c.model = m.id_model
		AND c.bodywork = bo.id_bodywork
		AND c.motor = ty.cod_tmotor) AS c";
        
		$sql.= " WHERE c." . $filter[0] . "= '" . $filter[1] ."'";

		// echo json_encode($sql);
		// exit;
		
		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);

		$retrArray = array();
		if (mysqli_num_rows($res) > 0) {
			while ($row = mysqli_fetch_assoc($res)) {
				$retrArray[] = $row;
			}
		}
		return $retrArray;
	}

	function select_count_shop($filter){

		// echo json_encode($filter);
		// exit;

		$consulta = " SELECT COUNT(*) AS n_prod
		FROM (SELECT * 
		FROM car c, brand b, model m, bodywork bo, type_motor ty
		WHERE m.brand = b.id_brand
		AND c.model = m.id_model
		AND c.bodywork = bo.id_bodywork
		AND c.motor = ty.cod_tmotor) AS c";
        
		for ($i=0; $i < count($filter); $i++){
			if ($i==0){
				if ($filter[$i][0] == 'order'){
					$consulta.= " ORDER BY " . $filter[$i][1] . " DESC";
				} else {
				$consulta.= " WHERE c." . $filter[$i][0] . "= '" . $filter[$i][1] ."'";
				}
			}else {
				if ($filter[$i][0] == 'order'){
				$consulta.= " ORDER BY " . $filter[$i][1] . " DESC";
				} else {
				$consulta.= " AND c." . $filter[$i][0] . "= '" . $filter[$i][1] ."'";
				}
			}
		}

		// echo json_encode($consulta);
		// exit;
		
		$conexion = connect::con();
        $res = mysqli_query($conexion, $consulta);
        connect::close($conexion);

        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
	}
	
	function select_count(){
        $select = "SELECT COUNT(*) contador
        FROM car";

        $conexion = connect::con();
        $res = mysqli_query($conexion, $select);
        connect::close($conexion);

        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }

	// LIKES
	function select_load_likes($username){
        $sql = "SELECT l.id_car FROM likes l WHERE l.id_user = (SELECT u.id_user FROM users u WHERE u.username = '$username')";
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }

    function select_likes($id_car, $username){
        $sql = "SELECT l.id_car FROM likes l
				WHERE l.id_user = (SELECT u.id_user FROM users u WHERE u.username = '$username')
				AND l.id_car = '$id_car'";
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }

    function like($id_car, $username){
        $sql = "INSERT INTO likes (id_user, id_car) VALUES ((SELECT  u.id_user FROM users u WHERE u.username= '$username') ,'$id_car');";
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }

    function dislike($id_car, $username){
        $sql = "DELETE FROM likes WHERE id_car='$id_car' AND id_user=(SELECT  u.id_user FROM users u WHERE u.username= '$username')";
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }
}