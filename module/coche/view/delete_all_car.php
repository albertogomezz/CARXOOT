<div id="contenido">
    <form autocomplete="on" method="post" name="delete_all_coches" id="delete_all_coches">
        <table border='0'>
            <tr>
            <th width=1500><h3>Quieres eliminar todos los coches?</h3></th>
            <td><input type="text" id="id" name="id" placeholder="id" value="xd" hidden/></td>
            </tr>
        </table>
        <table border='0'>
            <tr>
            <td><input name="Submit" type="button" class="Button_green" onclick="operations_coche('delete_all')" value="Aceptar"/></td>
                <td><a class="Button_red" href="index.php?page=controller_car&op=list">Cancelar</a></td>
            </tr>
        </table>
        <br>
        <br>
    </form>
</div>