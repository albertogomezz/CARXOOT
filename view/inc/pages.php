	<?php
	if(isset($_GET['page'])){
		switch($_GET['page']){
			case "homepage";
				include("module/home/view/home.html");
				break;
			case "ctrl_home";
			include("module/home/ctrl/".$_GET['page'].".php");
				break;
			case "ctrl_shop";
				include("module/shop/ctrl/".$_GET['page'].".php");
				break;
			case "ctrl_login";
				include("module/login/ctrl/".$_GET['page'].".php");
				break;
			case "ctrl_cart";
				include("module/cart/ctrl/".$_GET['page'].".php");
				break;
			case "about";
				include("module/about/".$_GET['page'].".html");
				break;
			case "404";
				include("view/inc/error".$_GET['page'].".php");
				break;
			case "503";
				include("view/inc/error".$_GET['page'].".php");
				break;
			default;
				include("module/home/ctrl/".$_GET['page'].".php");
				break;
		}
	} else {
		include("module/home/ctrl/ctrl_home.php");
	}
?>