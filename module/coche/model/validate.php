<?php
    function validate_numero_licencia($numero_licencia){

        $mysqli = "SELECT * FROM cars WHERE numero_licencia='$numero_licencia'";

        $conexion = connect::con();
        $res = mysqli_query($conexion, $mysqli);
        $res = mysqli_num_rows($res);
        connect::close($conexion);

        return $res;
    }

    function validate_matricula($matricula){

        $mysqli = "SELECT * FROM cars WHERE matricula='$matricula'";

        $conexion = connect::con();
        $res = mysqli_query($conexion, $mysqli);
        $res = mysqli_num_rows($res);
        connect::close($conexion);

        return $res;
    }

    function validate() {

        // $data = 'hola validate php';
        // die('<script>console.log('.json_encode( $data ) .');</script>');

        $check = true;

        $v_numero_licencia = $_POST['numero_licencia'];
        $v_matricula = $_POST['matricula'];

        $r_numero_licencia = validate_numero_licencia($v_numero_licencia);
        $r_matricula = validate_matricula($v_matricula);

        if($r_numero_licencia != null){
        // $error_Num_bastidor = "* El numero de chasis introducido, no es valido";
        echo '<script language="javascript">setTimeout(() => {
            toastr.error("El número de licencia, ya se encuentra almacenado");
        }, 1000);</script>';
            $check = false;
        }

        if($r_matricula != null){
            echo '<script language="javascript">setTimeout(() => {
                toastr.error("El número de matricula, ya se encuentra almacenado");
            }, 1000);</script>';
            $check = false;
        }

        return $check;
    }