<?php
    // $path = $_SERVER['DOCUMENT_ROOT'] . '/Pagina_Con_Filtros/';
    // include($path . 'module/search/model/DAO_search.php');

    $path = $_SERVER['DOCUMENT_ROOT'] . '/CARXOOT/';
    include($path . "/module/search/model/DAO_search1.php");
    // @session_start();

    switch ($_GET['op']) {

        case 'search_brand';

            // echo json_encode("Hola");
            // exit;

            $homeQuery = new DAO_search();
            $selSlide = $homeQuery -> search_brand_only();
            if (!empty($selSlide)) {
                echo json_encode($selSlide);
            }
            else {
                echo "error";
            }
        break;

        case 'search_model_null';

            // echo json_encode("Hola");
            $homeQuery = new DAO_search();
            $selSlide = $homeQuery -> search_model_only();
            if (!empty($selSlide)) {
                echo json_encode($selSlide);
            }
            else {
                echo "error";
            }
        break;

        case 'search_model';
            $homeQuery = new DAO_search();
            $selSlide = $homeQuery -> search_model($_POST['brand']);        
            if (!empty($selSlide)) {
                echo json_encode($selSlide);
            }
            else {
                echo "error";
            }
        break;

        case 'autocomplete';

            try{
                $dao = new DAO_search();
                if (!empty($_POST['brand']) && empty($_POST['category'])){
                    $rdo = $dao->select_only_brand($_POST['city'], $_POST['brand']);
                }else if(!empty($_POST['brand']) && !empty($_POST['category'])){
                    $rdo = $dao->select_brand_category($_POST['city'], $_POST['brand'], $_POST['category']);
                }else if(empty($_POST['brand']) && !empty($_POST['category'])){
                    $rdo = $dao->select_only_category($_POST['category'], $_POST['city']);
                }else {
                    $rdo = $dao->select_city($_POST['city']);
                }
            }
            
            catch (Exception $e){
                echo json_encode("catch");
                exit;
            } if(!$rdo){
                echo json_encode("rdo!!!");
                exit;
            } else{
                $dinfo = array();
                foreach ($rdo as $row) {
                    array_push($dinfo, $row);
                }
                echo json_encode($dinfo);
            }

        break; 
}