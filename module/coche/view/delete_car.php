<div id="contenido">
    <form autocomplete="on" method="post" name="delete_coche" id="delete_coche">
        <table border='0'>
            <tr>
                <td align="center"  colspan="2"><h3>¿Desea seguro borrar el coche con matricula <?php echo $id['matricula']; ?>?</h3></td>
                <td><input type="text" id="id" name="id" placeholder="id" value="<?php echo $id['id']; ?>" hidden/></td>
            </tr>
            </table>
        <table border='0'>
            <tr>
                <td><input name="Submit" type="button" class="Button_green" onclick="operations_coche('delete')" value="Aceptar"/></td>
                <td align="center"><a class="Button_red" href="index.php?page=controller_car&op=list">Cancelar</a></td>
            </tr>
        </table>
    </form>
</div>