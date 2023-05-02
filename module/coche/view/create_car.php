<div id="contenido">
    <form autocomplete="on" method="post" name="alta_coche" id="alta_coche">

        <h1>Coche nuevo</h1>
        <table border='0'>
            <tr>
                <td>Numero de licencia </td>
                <td><input type="text" id="numero_licencia" name="numero_licencia" placeholder="numero de licencia" value=""/></td>
                <td><font color="red">
                    <span id="error_numero_licencia" class="error"></span>
                </font></font></td>
            </tr>
        
            <tr>
                <td>Marca: </td>
                <td><input type="text" id="marca" name="marca" placeholder="marca" value=""/></td>
                <td><font color="red">
                    <span id="error_marca" class="error"></span>
                </font></font></td>
            </tr>
            
            <tr>
                <td>Modelo: </td>
                <td><input type="text" id="modelo" name="modelo" placeholder="modelo" value=""/></td>
                <td><font color="red">
                    <span id="error_modelo" class="error"></span>
                </font></font></td>
            </tr>

            <tr>
                <td>Matricula: </td>
                <td><input type="text" id="matricula" name="matricula" placeholder="matricula" value=""/></td>
                <td><font color="red">
                    <span id="error_matricula" class="error">
                        <?php
                            // echo "$r_matricula";
                        ?>
                    </span>
                </font></font></td>
            </tr>
            
            <tr>
                <td>Km: </td>
                <td><input type="text" id="km" name="km" placeholder="km" value=""/></td>
                <td><font color="red">
                    <span id="error_km" class="error"></span>
                </font></font></td>
            </tr>

            <tr>
                <td>Categoria: </td>
                <td><select id="categoria[]" name="categoria">
                    <option value="KM0">KM0</option>
                    <option value="RT">RT</option>
                    <option value="SM">SM</option>
                    </select></td>
                    <td><font color="red">
                    <span id="error_categoria" class="error"></span>
                </font></font></td>
            </tr>

            <tr>
                <td>Tipo: </td>
                <td><select id="tipo[]" name="tipo">
                    <option value="Electrico">Electrico</option>
                    <option value="Gasolina">Gasolina</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Hibrido">Hibrido</option>
                    </select></td>
                    <td><font color="red">
                    <span id="error_tipo" class="error"></span>
                </font></font></td>
            </tr>
            
            <tr>
                <td>Comentarios: </td>
                <td><textarea cols="30" rows="5" id="comentarios" name="comentarios" placeholder="comentarios" value=""></textarea></td>
                <!-- <td><font color="red">
                    <span id="error_comentarios" class="error"></span>
                </font></font></td> -->
            </tr>

            <tr>
                <td>Fecha de alta: </td>
                <td><input id="fecha_de_alta" type="date" name="fecha_de_alta" value=""/></td>
                <td><font color="red">
                    <span id="error_fecha_de_alta" class="error"></span>
                </font></font></td>
            </tr>
            
            <tr>
                <td>Color: </td>
                <td><input type="text" id="color" name="color" placeholder="color" value=""/></td>
                <td><font color="red">
                    <span id="error_color" class="error"></span>
                </font></font></td>
            </tr>

            <tr>
                <td>Extras: </td>
                <td><input type="checkbox" id= "extras[]" name="extras[]" placeholder= "extras" value="Navegador"/>Navegador
                    <input type="checkbox" id= "extras[]" name="extras[]" placeholder= "extras" value="CamaraTrasera"/>Camara Trasera</td>
                    <td><font color="red">
                    <span id="error_extras" class="error"></span>
                </font></font></td>
            </tr>

            <tr>
                <td>Imagen del coche: </td>
                <td><input type="text" id="imagen_coche" name="imagen_coche" placeholder="imagen_coche" value=""/></td>
                <td><font color="red">
                    <span id="error_imagen_coche" class="error"></span>
                </font></font></td>
            </tr>

            <tr>
                <td>Precio: </td>
                <td><input type="text" id="precio" name="precio" placeholder="precio" value=""/></td>
                <td><font color="red">
                    <span id="error_precio" class="error"></span>
                </font></font></td>
            </tr>

            <tr>
                <td>Puertas: </td>
                <td><input type="text" id="puertas" name="puertas" placeholder="puertas" value=""/></td>
                
                <td><font color="red">
                    <span id="error_puertas" class="error"></span>
                </font></font></td>
            </tr>

            <tr>
                <td>Ciudad: </td>
                <td><input type="text" id="ciudad" name="ciudad" placeholder="ciudad" value=""/></td>
                <td><font color="red">
                    <span id="error_ciudad" class="error"></span>
                </font></font></td>
            </tr>

            <tr>
                <td>Latitud: </td>
                <td><input type="text" id="latitud" name="latitud" placeholder="latitud" value=""/></td>
                <td><font color="red">
                    <span id="error_latitud" class="error"></span>
                </font></font></td>
            </tr>

            <tr>
                <td>Longitud: </td>
                <td><input type="text" id="longitud" name="longitud" placeholder="longitud" value=""/></td>
                <td><font color="red">
                    <span id="error_longitud" class="error"></span>
                </font></font></td>
            </tr>
            
            <tr>
                <td><br><input name="Submit" type="button" class="Button_red_2" onclick="validate('create')" value="Enviar"/></td>
                <td align="right"><a href="index.php?page=controller_car&op=list">Volver</a></td>
            </tr>
        </table>
    </form>
</div>