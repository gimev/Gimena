<?php
require('conexion.php');
session_start();
if (isset($_SESSION ['id']) && !empty($_SESSION['id'])) { //averiguar funcion isset
    if ($link = conectarse($host='localhost', $user='root', $pass='', $db='progresardb')) {
        $sql = "select * from vehiculos";
        $query = mysql_query($sql, $link);

        if (mysql_num_rows($query) > 0) { //sihay datos?
            //<a href="registro.html"> Volver Registro </a>
            ?>
            <table border="2">
                <tr>
                    <th>Patente</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Estado</th>
                    <th>Fecha Ingreso</th>
                    <th>Fecha Egreso</th>
                    <th>Observaciones</th>
                    <th>Acciones</th>

                </tr>

                <?php while ($row = mysql_fetch_array($query)) { ?>

                    <tr>
                        <td><?php echo $row['patente']; ?> </td>
                        <td><?php echo $row['modelo']; ?> </td>
                        <td><?php echo $row['anio']; ?> </td>
                        <td><?php echo $row['nombre']; ?> </td>
                        <td><?php echo $row['apellido']; ?> </td>
                        <td><?php echo $row['estado']; ?> </td>
                        <td><?php echo $row['fechaIngreso']; ?> </td>
                        <td><?php echo $row['fechaEgreso']; ?> </td>
                        <td><?php echo $row['observacion']; ?> </td>


                        <td><a href="eliminar.php?id=<?= $row['patente'] ?>">Eliminar </a></td>
                        <td><a href="editar.php?id=<?= $row['patente'] ?>">Editar </a></td>
                        <td><a href="alta.php?id=<?= $row['patente'] ?>">Alta </a></td>


                    </tr>
                <?php } ?>
            </table>
            <?php
        }
        ?>        
        <a href="salir.php">Salir</a>
        <?php
    } else {
        echo 'No se conecto a la BD';
    }
} else {
    echo 'Sesion no inicializada';
}
?>