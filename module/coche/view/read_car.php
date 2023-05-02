<div id="contenido">
    <h1>Informacion del Coche</h1>
    <p>
    <table border='2'>
        <tr>
            <td>Numero de Licencia: </td>
            <td>
                <?php
                    echo $id['numero_licencia'];
                ?>
            </td>
        </tr>
    
        <tr>
            <td>Marca: </td>
            <td>
                <?php
                    echo $id['marca'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Modelo: </td>
            <td>
                <?php
                    echo $id['modelo'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Matricula: </td>
            <td>
                <?php
                    echo $id['matricula'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Km: </td>
            <td>
                <?php
                    echo $id['km'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Categoria: </td>
            <td>
                <?php
                    echo $id['categoria'];
                ?>
            </td>
        </tr>

        <tr>
            <td>Tipo: </td>
            <td>
                <?php
                    echo $id['tipo'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Comentarios: </td>
            <td>
                <?php
                    echo $id['comentarios'];
                ?>
            </td>
            
        </tr>
        
        <tr>
            <td>Fecha de alta: </td>
            <td>
                <?php
                    echo $id['fecha_de_alta'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Color: </td>
            <td>
                <?php
                    echo $id['color'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Extras: </td>
            <td>
                <?php
                    echo $id['extras'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Imagen de Coche: </td>
            <td>
                <?php
                    echo $id['imagen_coche'];
                ?>
            </td>
        </tr>

        <tr>
            <td>Puertas: </td>
            <td>
                <?php
                    echo $id['puertas'];
                ?>
            </td>
        </tr>

        <tr>
            <td>Ciudad: </td>
            <td>
                <?php
                    echo $id['ciudad'];
                ?>
            </td>
        </tr>

        <tr>
            <td>Latitud: </td>
            <td>
                <?php
                    echo $id['latitud'];
                ?>
            </td>
        </tr>

        <tr>
            <td>Longitud: </td>
            <td>
                <?php
                    echo $id['longitud'];
                ?>
            </td>
        </tr>
    </table>
    </p>
    <p><a href="index.php?page=controller_car&op=list">Volver</a></p>
</div>