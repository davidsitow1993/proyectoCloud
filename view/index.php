<!DOCTYPE html>
<?php
session_start();
include_once '../model/Contacto.php';
include_once '../model/ContactoModel.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contactos</title>
        <script type="text/javascript" language="javascript">
            function confirmar() {
                return confirm("Desea Eliminar este Contacto?");
            }
        </script>
    </head>
    
    <body>
        <h1>EJERCICIO 2 Y 3 - CONTACTOS</h1>
        <form action="../controller/controller.php">
            <input type="hidden" name="opcion" value="insertar">
            <table>
                <tr>
                    <td>NOMBRES</td>
                    <td><input type="text" name="nombres"  maxlength="15" required=""></td>
                </tr>
                <tr>
                    <td>CELULAR</td>
                    <td><input type="text" name="celular" required=""></td>
                </tr>
                <tr>
                    <td>DIRECCI&Oacute;N</td>
                    <td><input type="text" name="direccion" required=""></td>
                </tr>
                <tr><td><input type="submit" value="Insertar contacto nuevo"></td></tr>
            </table>
        </form>
        <table>
            <tr><td><form action="../controller/controller.php">
                        <input type="hidden" name="opcion" value="listar">
                        <input type="submit" value="Consultar listado">
                    </form></td></tr>
        </table>
        <table border="1">
            <tr>
                <th>ID_CONTACTO</th>
                <th>NOMBRES</th>
                <th>CELULAR</th>
                <th>DIRECCI&Oacute;N</th>
                <th>ELIMINAR</th>
            </tr>
            <?php
            //verificamos si existe en sesion el listado de facturas:
            if (isset($_SESSION['listado'])) {
                $listado = unserialize($_SESSION['listado']);
                foreach ($listado as $c) {
                    echo "<tr>";
                    echo "<td>" . $c->getIdContacto() . "</td>";
                    echo "<td>" . $c->getNombres() . "</td>";
                    echo "<td>" . $c->getCelular() . "</td>";
                    echo "<td>" . $c->getDireccion() . "</td>";
                    echo '<td><a href="../controller/controller.php?opcion=eliminar&idContacto='
                    . $c->getIdContacto() . '" onclick="return confirmar()">X</a></td>';
                    echo "</tr>";
                }
            } else {
                echo "No se han cargado datos.";
            }
            ?>
        </table>
    </body>
</html>

