<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/CARXOOT/';
include($path . "/model/connect.php");

class DAO_search {
    
    function search_brand_only(){

        // echo json_encode("Hola");
        // exit;

        $select="SELECT *
        FROM brand b";


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

    function search_model_only(){
        $select="SELECT *
        FROM model m;";
            
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

    function search_model($brand){
        $select="SELECT *
        FROM car c, model m, brand b
        WHERE m.id_model = c.model 
        AND  m.brand = b.id_brand
        AND b.name_brand = '$brand'";

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

    function select_only_brand($city, $brand){

        // echo json_encode("autocomplete");
        // exit;

        $select="SELECT *
        FROM car c, model m, brand b
        WHERE c.model = m.id_model 
        AND m.brand = b.id_brand
        AND b.name_brand = '$brand'
        AND city LIKE '$city%'";

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

    function select_only_model($model, $complete){
        // $select="SELECT *
        // FROM car c
        // WHERE categoria = '$model' AND city LIKE '$complete%'";
        
        $select="SELECT *
        FROM car c , model m
        WHERE c.model = m.id_model
        AND m.name_model = '$model' 
        AND c.city LIKE '$complete%'";

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

    function select_brand_model($complete, $brand, $model){
        $select="SELECT *
        FROM car c , brand b, model m
        WHERE c.model = m.id_model
        AND m.brand = b.id_brand
        AND b.name_brand = '$brand'
        AND m.name_model = '$model'
        AND c.city LIKE '$complete%'";
        
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
}