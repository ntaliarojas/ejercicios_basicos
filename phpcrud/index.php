<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>   
    <body>
        <form action="" method="POST">
            <label for="nombres">Nombres</label>
            <input name="nombres" type="text">
            <br/>
            <label for="apellidos">Apellidos</label>
            <input name="apellidos" type="text">
            <br/>
            <label for="profesion">Profesión</label>
            <input name="profesion" type="text">
            <br/>
            <label for="pais">País</label>
            <select required name="pais">
                <option value="">Seleccione una opción</option>
                <option value="Colombia">Colombia</option>
                <option value="Argentina">Argentina</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Peru">Peru</option>

            </select>
            <br/>
            <button name="insertar" type="submit">Guardar</button>

        </form>
        <br/>


        <?php
        include('BDconnect.php');

        //Read
        $sql = "SELECT * FROM tbl_personal";
        $query = $connect->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {
            echo "<table border = '1'>
    <th>Id</th>
    <th>Nombres</th>
    <th>Apellidos</th>
    <th>Profesion</th>
    <th>País</th>
    <th>Fecha registro</th>
    <th>Acciones</th> 
    ";
            foreach ($results as $result) {
                echo "<tr>
<td>" . $result->id . "</td>
<td>" . $result->nombres . "</td>
<td>" . $result->apellidos . "</td>
<td>" . $result->profesion . "</td>
<td>" . $result->pais . "</td>
<td>" . $result->fregis . "</td>
<td> 
<form method='POST' action='actualizar.php'>
<input type='hidden' name='id' value='" . $result->id . "'>
<button name='editar'>Editar</button>
</form>
</td>
<td>
<form method='POST' action=''>
<input type='hidden' name='id' value='" . $result->id . "'>
<button name='eliminar'>Eliminar</button>
</form>
</td>
</tr>";
            }
            echo '</table>';
        }

        //create
        if (isset($_POST['insertar'])) {
            //capturar la información enviada desde el formulario
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $profesion = $_POST['profesion'];
            $pais = $_POST['pais'];
            $fregis = date('Y-m-d');

            $sql = "insert into tbl_personal(nombres,apellidos,profesion,pais,fregis)
                 values (:nombres,:apellidos,:profesion,:pais,:fregis)";
            $sql = $connect->prepare($sql);

            $sql->bindParam(':nombres', $nombres, PDO::PARAM_STR);
            $sql->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
            $sql->bindParam(':profesion', $profesion, PDO::PARAM_STR);
            $sql->bindParam(':pais', $pais, PDO::PARAM_STR);
            $sql->bindParam(':fregis', $fregis, PDO::PARAM_STR);

            $sql->execute();

            $lastInsertId = $connect->LastInsertId();

            if ($lastInsertId > 0) {
                echo "<script language='javascript'> alert('Registro guardado '); window.location.href = 'index.php';</script>";
            } else {
                echo "<script language='javascript'> alert('Registro no guardado'); window.location.href = 'index.php';</script>";
                print_r($sql->errorInfo());
            }
        }
        
         if (isset($_POST['eliminar'])) {

            $id = $_POST['id'];
            
            $sql = "DELETE FROM tbl_personal WHERE id = '$id'";
            $query = $connect->prepare($sql);
            $query->execute();
            
                        echo "<script language='javascript'> alert('Registro $id eliminado'); window.location.href = 'index.php';</script>";
         }

        if (isset($_POST['editar'])) {


            $id = $_POST['id'];

            echo "El registro a actualizar es $id";
        }
        ?>
    </body>
</html>
