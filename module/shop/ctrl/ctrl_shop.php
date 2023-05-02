<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/CARXOOT/';
include($path . "/module/shop/model/DAO_shop.php");
include($path . "/model/middleware_auth.php");

@session_start();

if (isset($_SESSION["tiempo"])) {  
    $_SESSION["tiempo"] = time();
}

switch ($_GET['op']) {

    case 'list_shop':
        include("module/shop/view/shop.html");
    break;

        //TODOS LOS COCHES

    case 'all_cars':

        // echo json_encode('hola todos los coches');
        // exit;

        $items = $_POST['items'];

        $total_items = $_POST['total_items'];
        
        try{
            $daohome = new DAOShop();
            $Select_all_cars = $daohome->select_all_cars($items,$total_items);
        } catch(Exception $e){
            echo json_encode("error");
        }

        if(!empty($Select_all_cars)){
            echo json_encode($Select_all_cars); 
        }
        else{
            echo json_encode("error");
        }
        break;

        //SOLO UN COCHE

    case 'details_car':

        try {
            $daoshop = new DAOShop();
            $Date_car = $daoshop-> select_one_car($_GET['id']);
            } catch (Exception $e) {
                echo json_encode("error");
            }
        try {
            $daoshop_img = new DAOShop();
            $Date_images = $daoshop_img->select_imgs_car($_GET['id']);
        } catch (Exception $e) {
            echo json_encode("error");
        }

        if (!empty($Date_car || $Date_images)) {
            $rdo = array();
            $rdo[0] = $Date_car;
            $rdo[1][] = $Date_images;
            echo json_encode($rdo);
        }
        else {
            echo json_encode("error");
        }
        break;

        //FILTROS

    case 'filter';
        // echo json_encode("hola");
        // exit;
        $filter = $_POST['filter'];
        // echo json_encode($filter);
        // exit;

        $items = $_POST['items'];
        // echo json_encode($items);
        // exit;
        
        $total_items = $_POST['total_items'];
        // echo json_encode($total_items);
        // exit;
    
        $homeQuery = new DAOShop();
        $selSlide = $homeQuery -> filters($filter,$items,$total_items);
        if (!empty($selSlide)) {
            echo json_encode($selSlide);
        }
        else {
            echo "error";
        }
        break;

        // FILTROS SEARCH

    case 'filters_search';

        $homeQuery = new DAO_shop();
        $selSlide = $homeQuery -> search_filters($_POST['filters_search']);
        if (!empty($selSlide)) {
            echo json_encode($selSlide);
        }
        else {
            echo "error";
        }
        break;

        // CONTADOR DE VISITAS

    case 'contador_visitas';

        try {
            $daoshop = new DAOShop();
            $Date_car = $daoshop-> contador($_GET['id']);
        } 
        catch (Exception $e) {
            echo json_encode("error");
        }
        break;

        // CONTAR TODOS LOS COCHES (SHOP_ALL)

    case 'count_all';

        // echo json_encode("hola");
        // exit;

        try {
            $dao = new DAOShop();
            $rdo = $dao->select_count_all();
        } catch (Exception $e) {
            echo json_encode("error");
            exit;
        }
        if(!empty($rdo)){
            echo json_encode($rdo); 
        }
        else{
            echo json_encode("error");
        }
        break;

        //CONTAR LOS COCHES FILTRADOS CON HOME

    case 'count_home';

        // echo json_encode("hola");
        // exit;
        $filter = $_POST['filter'];

        // echo json_encode($filter);
        // exit;

        try {
            $dao = new DAOShop();
            $rdo = $dao->select_count_home($filter);
        } catch (Exception $e) {
            echo json_encode("error");
            exit;
        }
        if(!empty($rdo)){
            echo json_encode($rdo); 
        }
        else{
            echo json_encode("error");
        }
        break;

    case 'count_shop';

        // echo json_encode("hola");
        // exit;
        $filter = $_POST['filter'];

        // echo json_encode($filter);
        // exit;

        try {
            $dao = new DAOShop();
            $rdo = $dao->select_count_shop($filter);
        } catch (Exception $e) {
            echo json_encode("error");
            exit;
        }
        if(!empty($rdo)){
            echo json_encode($rdo); 
        }
        else{
            echo json_encode("error");
        }
        break;

        // CONTAR COCHES RELACIONADOS

    case 'count_cars_related':

        $brand = $_POST['brand_name'];
        $id_car = $_POST['id_car'];
        try {
            $dao = new DAOShop();
            $rdo = $dao->count_more_cars_related($brand, $id_car);
        } catch (Exception $e) {
            echo json_encode("error");
            exit;
        }
        if (!$rdo) {
            echo json_encode("error");
            exit;
        } else {
            $dinfo = array();
            foreach ($rdo as $row) {
                array_push($dinfo, $row);
            }
            echo json_encode($dinfo);
        }
        break;
        
        // SACAR INFO COCHES RELACIONADOS CON LA MISMA MARCA
        
    case 'coches_relacionados':

        $brand = $_POST['brand_name'];
        $id_car = $_POST['id_car'];
        $total =  $_POST['total_items'];
        $items =  $_POST['items'];
        try {
            $dao = new DAOShop();
            $rdo = $dao->select_cars_related($brand, $id_car, $items, $total);
        } catch (Exception $e) {
            echo json_encode("error");
            exit;
        }
        if (!$rdo) {
            echo json_encode("error");
            exit;
        } else {
            $dinfo = array();
            foreach ($rdo as $row) {
                array_push($dinfo, $row);
            }
            echo json_encode($dinfo);
        }
        break;
    
    // case 'count';    
    //     $homeQuery = new DAOShop();
    //     $selSlide = $homeQuery -> select_count();
    //     if (!empty($selSlide)) {
    //         echo json_encode($selSlide);
    //     }
    //     else {
    //         echo "error";
    //     }
    //     break;

    case 'control_likes':
        $token = $_POST['token'];
        $id_car = $_POST['id_car'];

        try {
            $json = decode_token($token);
            $dao = new DAOShop();
            $rdo = $dao->select_likes($id_car, $json['username']);
        } catch (Exception $e) {
            echo json_encode("error");
            exit;
        }
        if (!$rdo) {
            echo json_encode("error");
            exit;
        } else {
            $dinfo = array();
            foreach ($rdo as $row) {
                array_push($dinfo, $row);
            }
            if (count($dinfo) === 0) {
                $dao = new DAOShop();
                $rdo = $dao->like($id_car, $json['username']);
                echo json_encode("0");
            } else {
                $dao = new DAOShop();
                $rdo = $dao->dislike($id_car, $json['username']);
                echo json_encode("1");
            }
        }
        break;

    case 'load_likes_user';

        try {
            
            $token = $_POST['token'];

            $json = decode_token($token);
            $dao = new DAOShop();

            // echo json_encode($json);
            // exit;

            $rdo = $dao->select_load_likes($json['username']);
        } 
        catch (Exception $e) {
            echo json_encode("error");
            exit;
        }
        if (!$rdo) {
            echo json_encode("error");
            exit;
        } else {
            $dinfo = array();
            foreach ($rdo as $row) {
                array_push($dinfo, $row);
            }
            echo json_encode($dinfo);
        }
        break;
}