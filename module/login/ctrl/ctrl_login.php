<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/CARXOOT/';
include($path . "/module/login/model/DAO_login.php");
include($path . "/model/middleware_auth.php");
@session_start();

if (isset($_SESSION["tiempo"])) {  
    $_SESSION["tiempo"] = time();
}

switch ($_GET['op']) {
    
    case 'login-register_view';
        include("module/login/view/login-register.html");
        // include('views/pages/footer.html');
        break;

    case 'register':
        // Comprobar que la email no exista
        try {
            $daoLog = new DAOLogin();
            $check = $daoLog->select_email($_POST['email_reg']);
        } catch (Exception $e) {
            echo json_encode("error");
            exit;
        }

        if ($check) {
            $check_email = false;
        } else {
            $check_email = true;
        }

        // Si no existe el email creará el usuario
        if ($check_email) {
            try {
                $daoLog = new DAOLogin();
                $rdo = $daoLog->insert_user($_POST['username_reg'], $_POST['email_reg'], $_POST['passwd1_reg']);
            } catch (Exception $e) {
                echo json_encode("error");
                exit;
            }
            if (!$rdo) {
                echo json_encode("error_user");
                exit;
            } else {
                echo json_encode("ok");
                exit;
            }
        } else {
            echo json_encode("error_email");
            exit;
        }
        break;

    case 'login':
        try {
            $daoLog = new DAOLogin();
            $rdo = $daoLog->select_user($_POST['username_log']);

            if ($rdo == "error_user") {
                echo json_encode("error_user");
                exit;
            } else {
                if (password_verify($_POST['passwd_log'], $rdo['password'])) {
                    $token= create_token($rdo["username"]);
                    $_SESSION['username'] = $rdo['username']; //Guardamos el usario 
                    $_SESSION['tiempo'] = time(); //Guardamos el tiempo que se logea
                    echo json_encode($token);
                    exit;
                } else {
                    echo json_encode("error_passwd");
                    exit;
                }
            }
        } catch (Exception $e) {
            echo json_encode("error");
            exit;
        }
        break;

    case 'logout':
        unset($_SESSION['username']);
        unset($_SESSION['tiempo']);
        session_destroy();

        echo json_encode('Done');
        break;

    case 'data_user':
        $json = decode_token($_POST['token']);
        $daoLog = new DAOLogin();
        $rdo = $daoLog->select_data_user($json['username']);
        echo json_encode($rdo);
        exit;
        break;

    case 'actividad':
        if (!isset($_SESSION["tiempo"])) {
            echo json_encode("inactivo");
            exit();
        } else {
            if ((time() - $_SESSION["tiempo"]) >= 60) { //1800s=30min
                echo json_encode("inactivo");
                exit();
            } else {
                echo json_encode("activo");
                exit();
            }
        }
        break;

    case 'controluser':
        $token_dec = decode_token($_POST['token']);

        if ($token_dec['exp'] < time()) {
            echo json_encode("Wrong_User");
            exit();
        }

        if (isset($_SESSION['username']) && ($_SESSION['username']) == $token_dec['username']) {
            echo json_encode("Correct_User");
            exit();
        } else {
            echo json_encode("Wrong_User");
            exit();
        }
        break;

    case 'refresh_token':
        $old_token = decode_token($_POST['token']);
        $new_token = create_token($old_token['username']);
        echo json_encode($new_token);
        break;

    case 'refresh_cookie':
        session_regenerate_id();
        echo json_encode("Done");
        exit;
        break;

    default;
        include("module/exceptions/views/pages/error404.php");
        break;
}
