<?php
    // include ("module/coche/model/DAOCar.php");
    // session_start();

    // $path = $_SERVER['DOCUMENT_ROOT'] . '8_MVC_CRUD';
    include('C:\xampp\htdocs\8_MVC_CRUD\module\coche\model\DAOCar.php');
    
    switch($_GET['op']){
        case 'list';
            // $data = 'hola crtl car';
            // die('<script>console.log('.json_encode( $data ) .');</script>');

            try{
                $daocar = new DAOCar();
            	$rdo = $daocar->select_all_car();
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
    			$callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
    		}else{
                include("module/coche/view/list_cars.php");
    		}
            break;
            
        case 'create';
            // $data = 'hola crtl car create';
            // die('<script>console.log('.json_encode( $data ) .');</script>');

            include("module/coche/model/validate.php");
            
            $check = true;
            
            if ($_POST){
                // $data = 'hola create post car';
                // die('<script>console.log('.json_encode( $data ) .');</script>');

                $check=validate();

                // die('<script>console.log('.json_encode( $check ) .');</script>');
                
                if ($check){
                    $_SESSION['car']=$_POST;
                    
                    try{
                        $daocar = new DAOCar();
    		            $rdo = $daocar->insert_car($_POST);
                    }catch (Exception $e){
                        $callback = 'index.php?page=503';
        			    die('<script>window.location.href="'.$callback .'";</script>');
                    }
                    
		            if($rdo){
            			echo '<script language="javascript">alert("Registrado en la base de datos correctamente")</script>';
            			$callback = 'index.php?page=controller_car&op=list';
        			    die('<script>window.location.href="'.$callback .'";</script>');
            		}else{
            			$callback = 'index.php?page=503';
    			        die('<script>window.location.href="'.$callback .'";</script>');
            		}
                }
            }
            include("module/coche/view/create_car.php");
            break;
            
        case 'update';

            include("module/coche/model/validate.php");
            
            $check = true;
            
            if ($_POST){

                // $check=validate();
                
                if ($check) {

                    // die('<script>console.log('.json_encode( $_POST ) .');</script>');

                    $_SESSION['car']=$_POST;

                    // die('<script>console.log('.json_encode( $id ) .');</script>');
                    
                    try{
                        $daocar = new DAOCar();
    		            $rdo = $daocar->update_car($_POST);

                        // die('<script>console.log('.json_encode( $rdo ) .');</script>');

                    }catch (Exception $e){
                        $callback = 'index.php?page=503';
        			    die('<script>window.location.href="'.$callback .'";</script>');
                    }
                    
		            if($rdo){
            			echo '<script language="javascript">setTimeout(() => {
                            toastr.success("Creado en la base de datos correctamente");
                        }, 3000);</script>';
                        $callback = 'index.php?page=controller_car&op=list';
    			        die('<script>window.location.href="'.$callback .'";</script>');
            		}else{
            			$callback = 'index.php?page=503';
    			        die('<script>window.location.href="'.$callback .'";</script>');
            		}
                }
            }
            
            try{
                $daocar = new DAOCar();
                
            	$rdo = $daocar->select_car($_GET['id']);
                // die('<script>console.log('.json_encode( $rdo ) .');</script>');
            	$car=get_object_vars($rdo);

            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
    			$callback = 'index.php?page=503';
    			die('<script>window.location.href="'.$callback .'";</script>');
    		}else{
        	    include("module/coche/view/update_car.php");
    		}
            break;
            
        case 'read';
            // $data = 'hola crtl car read';
            // die('<script>console.log('.json_encode( $data ) .');</script>');
            try{
                //  die('<script>console.log('.json_encode( $_GET['id'] ) .');</script>');
                $daocar = new DAOCar();
            	$rdo = $daocar->select_car($_GET['id']);
            	$id=get_object_vars($rdo);
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
            if(!$rdo){
    			$callback = 'index.php?page=503';
    			die('<script>window.location.href="'.$callback .'";</script>');
    		}else{
                include("module/coche/view/read_car.php");
    		}
            break;
            
        case 'delete';
            if ($_POST){

                // die('<script>console.log('.json_encode( $_POST ) .');</script>');

                try{
                    $daoucar = new DAOCar();
                	$rdo = $daoucar->delete_car($_POST['id']);
                }catch (Exception $e){
                    $callback = 'index.php?page=503';
    			    die('<script>window.location.href="'.$callback .'";</script>');
                }
            	
            	if($rdo){
        			echo '<script language="javascript">alert("Borrado en la base de datos correctamente")</script>';
        			$callback = 'index.php?page=controller_car&op=list';
    			    die('<script>window.location.href="'.$callback .'";</script>');
        		}else{
        			$callback = 'index.php?page=503';
			        die('<script>window.location.href="'.$callback .'";</script>');
        		}
            }
            
            try{
                //  die('<script>console.log('.json_encode( $_GET['id'] ) .');</script>');
                $daocar = new DAOCar();
            	$rdo = $daocar->select_car($_GET['id']);
            	$id=get_object_vars($rdo);
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
            if(!$rdo){
    			$callback = 'index.php?page=503';
    			die('<script>window.location.href="'.$callback .'";</script>');
    		}else{
                include("module/coche/view/delete_car.php");
    		}

            break;

        case 'delete_all';
            if ($_POST){
                try{
                    $daocar = new DAOCar();
                    $rdo = $daocar -> delete_all_car();
                }catch (Exception $e){
                    $callback = 'index.php?module=errors&op=503';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }
                
                if($rdo){
                    echo '<script language="javascript">alert("Borrado en la base de datos correctamente")</script>';
                    $callback = 'index.php?page=controller_car&op=list';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }else{
                    $callback = 'index.php?module=errors&op=503&desc=Delete all error';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }
            }
        
        include("module/coche/view/delete_all_car.php");
        break;

        case 'dummies';
            if ($_POST){
                try{
                    $daocar = new DAOCar();
                    $rdo = $daocar -> dummies_cars();
                }catch (Exception $e){
                    $callback = 'index.php?module=errors&op=503';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }

                if($rdo){
                    echo '<script language="javascript">alert("Lista de coches creada correctamente")</script>';
                    $callback = 'index.php?page=controller_car&op=list';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }else{
                    $callback = 'index.php?module=errors&op=503&desc=Dummies error';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }
            }
            
            include("module/coche/view/dummies_car.php");
            break;

        case 'read_modal':
            //echo $_GET["modal"]; 
            //exit;

            try{
                $daocar = new DAOCar();
            	$rdo = $daocar->select_car($_GET['modal']);
            }catch (Exception $e){
                echo json_encode("error");
                exit;
            }
            if(!$rdo){
    			echo json_encode("error");
                exit;
    		}else{
    		    $coche=get_object_vars($rdo);
                echo json_encode($coche);
                //echo json_encode("error");
                exit;
    		}
            break;

        default;
            include("view/inc/error404.php");
            break;
    }