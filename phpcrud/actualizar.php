<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include('BDconnect.php');

        //Read
        $id = $_POST['id'];
        $sql = "SELECT * FROM tbl_personal where id=$id";
        $query = $connect->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        
        if ($query->rowCount() > 0 ) {
        
         echo "<form action='' method='POST'>";
            
            foreach ($results as $result) {
            echo "<table border =  '1'>
            <tr>
            <td> <label for='id'>Id</label></td>
            <td> <input name='id' type='text' value='$result->id' readonly></td>
            </tr>
            <br/>
            <tr>
            <td> <label for='nombres'>Nombres</label> </td>
            <td> <input name='nombres' type='text' value='$result->nombres'> </td>
            </tr>
            <br/>
            <tr>
            <td> <label for='apellidos'>Apellidos</label> </td>
            <td> <input name='apellidos' type='text' value='$result->apellidos'> </td>
            </tr>   
            <br/>
            <tr>
            <td> <label for='profesion'>Profesión</label> </td>
            <td> <input name='profesion' type='text' value='$result->profesion'> </td>
            </tr>    
            <br/>
            <tr>
            <td> <label for='pais'>País</label> </td>
            <td> <select required name='pais'>
                <option value=''>".$result->pais."</option>
                <option value='Colombia'>Colombia</option>
                <option value='Argentina'>Argentina</option>
                <option value='Ecuador'>Ecuador</option>
                <option value='Peru'>Peru</option>
            </select> </td>
            </tr>
            </table>
            <br/>
            <button name='actualizar' type='submit'>Confirmar</button>"
            ;
            }
    
        echo "</form>";
        }
        
        if (isset($_POST['actualizar'])) {
            
            $id = $_POST['id'];
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $profesion = $_POST['profesion'];
            $pais = $_POST['pais'];

            
            $sql = "update tbl_personal set nombres = '$nombres', apellidos = '$apellidos', profesion = '$profesion', pais = '$pais' where id = $id";
            $sql = $connect->prepare($sql);
            
            $sql->execute();
            
             echo "<script language='javascript'> alert('Registro $id actualizado'); window.location.href = 'index.php';</script>";
        }
        
        ?>
    </body>
</html>
