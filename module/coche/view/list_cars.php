<div id="contenido">
    <div class="container">
    	<div class="row">
    			<h3>LISTA DE COCHES</h3>
    	</div>

    	<div class="row">
        <table>
            <br>
                <tr>
                <th><p><a href="index.php?page=controller_car&op=create"><img src="view/img/anadir.png"></a></p></th>
    	        <th><p><a href="index.php?page=controller_car&op=dummies"><img src="view/img/dummies.png"></a></p></th>
                <th><p><a href="index.php?page=controller_car&op=delete_all"><img src="view/img/papelera.png"></a></p></th>
                </tr>
            </table>
    		
    		<table>
                <tr>
                    <td width=100><b>Id</b></th>
                    <td width=100><b>Marca</b></th>
                    <td width=100><b>Modelo</b></th>
                    <th width=100><b>Matricula</b></th>
                    <th width=100><b>KM</b></th>
                </tr>
                <?php
                    if ($rdo->num_rows === 0){
                        echo '<tr>';
                        echo '<td align="center"  colspan="3">NO HAY NINGUN COCHE</td>';
                        echo '</tr>';
                    }else{
                        foreach ($rdo as $row) {
                       		echo '<tr>';
                            echo '<td width=50>'. $row['id'] . '</td>';
                    	   	echo '<td width=50>'. $row['marca'] . '</td>';
                    	   	echo '<td width=50>'. $row['modelo'] . '</td>';
                            echo '<td width=50>'. $row['matricula'] . '</td>';
                            echo '<td width=50>'. $row['km'] . '</td>';
                            echo '<td width=350>';

                            print ("<div class='coche' id='".$row['id']."'>Detalles</div>");  //READ
                    	    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';


                    	   	// echo '<td width=350>';
                    	   	// echo '<a class="Button_blue" href="index.php?page=controller_car&op=read&id='.$row['id'].'">Read</a>';
                    	   	// echo '&nbsp;';
                    	   	// echo '<a class="Button_green" href="index.php?page=controller_car&op=update&id='.$row['id'].'">Update</a>';
                    	   	// echo '&nbsp;';
                    	   	// echo '<a class="Button_red" href="index.php?page=controller_car&op=delete&id='.$row['id'].'">Delete</a>';
                    	   	echo '</td>';
                    	   	echo '</tr>';  
                        }
                    }
                ?>
            </table>
    	</div>
    </div>
</div>

<!-- modal window -->
<!-- <section id="coche_modal">
    <div id="detalles_coche" hidden>
        <div id="detalles">
            <div id="container">
                Numero de licencia: <div id="numero_licencia"></div></br>
                Marca: <div id="marca"></div></br>
                Modelo: <div id="modelo"></div></br>
                Matricula: <div id="matricula"></div></br>
                Km: <div id="km"></div></br>
                Categoria: <div id="categoria"></div></br>
                Tipo: <div id="tipo"></div></br>
                Comentarios: <div id="comentarios"></div></br>
                Fecha de alta: <div id="fecha_de_alta"></div></br>
                Color: <div id="color"></div></br>
                Extras: <div id="extras"></div></br>
                Imagen_coche: <div id="imagen_coche"></div></br>
                Puertas: <div id="puertas"></div></br>
                Ciudad: <div id="ciudad"></div></br>
                Latitud: <div id="latitud"></div></br>
                Longitud: <div id="longitud"></div></br>
            </div>
        </div>
    </div>
</section> -->

<section id="coche_modal"></section>