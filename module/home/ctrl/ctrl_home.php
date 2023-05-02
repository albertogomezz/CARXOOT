<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/CARXOOT/';
    include($path . "/module/home/model/DAO_home.php");
    @session_start();
    if (isset($_SESSION["tiempo"])) {  
    $_SESSION["tiempo"] = time();
}

    if(isset($_GET['op'])){

    switch ($_GET['op']) {
        case 'list';
            include ('module/home/view/home.html');
        break;

        case 'Carrousel_Brand';
            try{
                $daohome = new DAOHome();
                $SelectBrand = $daohome->select_brand();
            } catch(Exception $e){
                echo json_encode("error");
            }
            
            if(!empty($SelectBrand)){
                echo json_encode($SelectBrand); 
            }
            else{
                echo json_encode("error");
            }
        break;

        case 'homePageCategory';
            try{
                $daohome = new DAOHome();
                $SelectCategory = $daohome->select_categories();
            } catch(Exception $e){
                echo json_encode("error");
            }
            
            if(!empty($SelectCategory)){
                echo json_encode($SelectCategory); 
            }
            else{
                echo json_encode("error");
            }
        break;

        case 'homePageType';
            try{
                $daohome = new DAOHome();
                $SelectType = $daohome->select_type_motor();
            } catch(Exception $e){
                echo json_encode("error");
            }
            
            if(!empty($SelectType)){
                echo json_encode($SelectType); 
            }
            else{
                echo json_encode("error");
            }
        break;

        case 'homeMostVisited';
            try{
                $daohome = new DAOHome();
                $SelectType = $daohome->select_most_visited();
            } catch(Exception $e){
                echo json_encode("error");
            }
            if(!empty($SelectType)){
                echo json_encode($SelectType); 
            }
            else{
                echo json_encode("error");
            }
        break;

        case 'coches_relacionados';
            try{
                $daohome = new DAOHome();
                $SelectType = $daohome->coches_relacionados();
            } catch(Exception $e){
                echo json_encode("error");
            }
            
            if(!empty($SelectType)){
                echo json_encode($SelectType); 
            }
            else{
                echo json_encode("error");
            }
        break;

        default;
            include("module/exceptions/views/pages/error404.php");
        break;
    }
}   else {
    $callback = "index.php?page=ctrl_home&op=list";
    die('<script>window.location.href="'.$callback .'";</script>');
}
?>