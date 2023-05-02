
<!-- die('<script>console.log('.json_encode( $id ) .');</script>'); -->

<div id="contenido">
    <form autocomplete="on" method="post" name="update_coche" id="update_coche">
        <h1>Modificar Coche</h1>
        <table border='0'>
            <tr> 
                <td>Numero de licencia: </td>
                <td><input type="text" id="numero_licencia" name="numero_licencia" placeholder="numero_licencia" value="<?php echo $car['numero_licencia'];?>" readonly/></td>
                <td><font color="red">
                    <span id="error_numero_licencia" class="error">
                    </span>
                </font></font></td>
            </tr>
        
            <tr>
                <td>Marca: </td>
                <td><input type="text" id="marca" name="marca" placeholder="marca" value="<?php echo $car['marca'];?>" readonly/></td>
                <td><font color="red">
                    <span id="error_marca" class="error">
                    </span>
                </font></font></td>
            </tr>
            
            <tr>
                <td>Modelo: </td>
                <td><input type="text" id="modelo" name="modelo" placeholder="modelo" value="<?php echo $car['modelo'];?>" readonly/></td>
                <td><font color="red">
                    <span id="error_modelo" class="error">
                    </span>
                </font></font></td>
            </tr>
            
            <tr>
                <td>Matricula: </td>
                <td><input type="text" id="matricula" name="matricula" placeholder="matricula" value="<?php echo $car['matricula'];?>" readonly/></td>
                <td><font color="red">
                    <span id="error_matricula" class="error">
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Km: </td>
                <td><input type="text" id="km" name="km" placeholder="km" value="<?php echo $car['km'];?>"/></td>
                <td><font color="red">
                    <span id="error_km" class="error">
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Categoria: </td>
                <td><select id="categoria[]" name="categoria" placeholder="categoria">
                    <?php
                        if($car['categoria']==="KMO"){
                    ?>
                        <option value="KMO" selected>KMO</option>
                        <option value="RT">RT</option>
                        <option value="SM">SM</option>
                    <?php
                        }elseif($car['categoria']==="RT"){
                    ?>
                        <option value="KMO">KMO</option>
                        <option value="RT" selected>RT</option>
                        <option value="SM">SM</option>
                    <?php
                        }else{
                    ?>
                        <option value="KMO">KMO</option>
                        <option value="RT">RT</option>
                        <option value="SM" selected>SM</option>
                    <?php
                        }
                    ?>
                    </select></td>
                    <td><font color="red">
                    <span id="error_categoria" class="error">
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Tipo: </td>
                <td><select id="tipo[]" name="tipo" placeholder="tipo">
                    <?php
                        if($car['tipo']==="Electrico"){
                    ?>
                        <option value="Electrico" selected>Electrico</option>
                        <option value="Gasolina">Gasolina</option>
                        <option value="Diesel">Diesel</option>
                        <option value="Hibrido">Hibrido</option>
                    <?php
                        }elseif($car['tipo']==="Gasolina"){
                    ?>
                        <option value="Electrico">Electrico</option>
                        <option value="Gasolina" selected>Gasolina</option>
                        <option value="Diesel">Diesel</option>
                        <option value="Hibrido">Hibrido</option>
                    <?php
                        }elseif($car['tipo']==="Diesel"){
                    ?>
                        <option value="Electrico">Electrico</option>
                        <option value="Gasolina">Gasolina</option>
                        <option value="Diesel" selected>Diesel</option>
                        <option value="Hibrido">Hibrido</option>
                    <?php
                        }else{
                    ?>
                        <option value="Electrico">Electrico</option>
                        <option value="Gasolina">Gasolina</option>
                        <option value="Diesel">Diesel</option>
                        <option value="Hibrido" selected>Hibrido</option>
                    <?php
                        }
                    ?>
                    </select></td>
                    <td><font color="red">
                    <span id="error_tipo" class="error">
                    </span>
                </font></font></td>
            </tr>
            
            <tr>
                <td>Comentarios: </td>
                <td><input type="text" id="comentarios" name="comentarios" placeholder="comentarios" value="<?php echo $car['comentarios'];?>"/></td>
                <td><font color="red">
                    <span id="error_comentarios" class="error">
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Fecha de alta: </td>
                <td><input id="fecha_de_alta" type="text" name="fecha_de_alta" placeholder="fecha_de_alta" value="<?php echo $car['fecha_de_alta'];?>"/></td>
                <td><font color="red">
                    <span id="error_fecha_de_alta" class="error">
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Color: </td>
                <td><input type="text" id="color" name="color" placeholder="color" value="<?php echo $car['color'];?>"/></td>
                <td><font color="red">
                    <span id="error_color" class="error">
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Extras: </td>
                <?php
                    $afi=explode(":", $car['extras']);
                ?>
                <td>
                    <?php
                        $busca_array=in_array("Navegador", $afi);
                        if($busca_array){
                    ?>
                        <input type="checkbox" id= "extras[]" name="extras[]" value="Navegador" checked/>Navegador
                    <?php
                        }else{
                    ?>
                    <input type="checkbox" id= "extras[]" name="extras[]" value="Navegador"/>Navegador
                    <?php
                        }
                    ?>
                    <?php
                        $busca_array=in_array("Camara Trasera", $afi);
                        if($busca_array){
                    ?>
                        <input type="checkbox" id= "extras[]" name="extras[]" value="Camara Trasera" checked/>Camara Trasera
                    <?php
                        }else{
                    ?>
                        <input type="checkbox" id= "extras[]" name="extras[]" value="Camara Trasera"/>Camara Trasera
                    <?php
                        }
                    ?>
                </td>
                <td><font color="red">
                    <span id="error_extras" class="error">
                    </span>
                </font></font></td>
            </tr>
            
            <tr>
                <td>Imagen de coche: </td>
                <td><input type="text" id="imagen_coche" name="imagen_coche" placeholder="imagen_coche" value="<?php echo $car['imagen_coche'];?>"/></td>
                <td><font color="red">
                    <span id="error_imagen_coche" class="error">
                    </span>
                </font></font></td>
            
            <tr>
                <td>Precio: </td>
                <td><input type="text" id="precio" name="precio" placeholder="precio" value="<?php echo $car['precio'];?>"/></td>
                <td><font color="red">
                    <span id="error_precio" class="error">
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Puertas: </td>
                <td><input type="text" id="puertas" name="puertas" placeholder="puertas" value="<?php echo $car['puertas'];?>"/></td>
                <td><font color="red">
                    <span id="error_puertas" class="error">
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Ciudad: </td>
                <td><input type="text" id="ciudad" name="ciudad" placeholder="ciudad" value="<?php echo $car['ciudad'];?>"/></td>
                <td><font color="red">
                    <span id="error_ciudad" class="error">
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Latitud: </td>
                <td><input type="text" id="latitud" name="latitud" placeholder="latitud" value="<?php echo $car['latitud'];?>"/></td>
                <td><font color="red">
                    <span id="error_latitud" class="error">
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Longitud: </td>
                <td><input type="text" id="longitud" name="longitud" placeholder="longitud" value="<?php echo $car['longitud'];?>"/></td>
                <td><font color="red">
                    <span id="error_longitud" class="error">
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td><br><input name="Submit" type="button" class="Button_red_2" onclick="validate('update')" value="Actualizar"/></td>
                <td align="right"><a href="index.php?page=controller_car&op=list">Volver</a></td>
            </tr>
        </table>
    </form>
</div>