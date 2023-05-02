<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Alta de Coches</title>

		<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css"/>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    	<script type="text/javascript">
        	$(function() {
        		$('#fecha').datepicker({
        			dateFormat: 'dd/mm/yy', 
        			changeMonth: true, 
        			changeYear: true, 
        			yearRange: '1900:2016',
        			onSelect: function(selectedDate) {
        			}
        		});
        	});
	    </script>
	    <!-- <link href="view/css/style.css" rel="stylesheet" type="text/css" /> -->
	    <script src="module/coche/model/validate_car.js"></script>
		<script src="view/js/utils.js"></script>
		

		<link rel="apple-touch-icon" href="view/assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="view/assets/img/favicon.ico">

    <link rel="stylesheet" href="view/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="view/assets/css/templatemo.css">
    <link rel="stylesheet" href="view/assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="view/assets/css/fontawesome.min.css">


	    <!-- Start Script -->
    <!-- <script src="view/assets/js/jquery-1.11.0.min.js"></script> -->
    <script src="view/assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="view/assets/js/bootstrap.bundle.min.js"></script>
    <script src="view/assets/js/templatemo.js"></script>
    <script src="view/assets/js/custom.js"></script>
    <!-- End Script -->

    </head>
    <body>