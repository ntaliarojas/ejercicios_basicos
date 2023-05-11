<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <br/>Saldo inicial de las cuentas
        <br/>-----------------------------------------------------------------------------------------<br/><br/>
        <table border='1'>

            <?php
            require 'Cuenta.php';

            $cuenta1 = new Cuenta("cuenta 1");
            $cuenta2 = new Cuenta("cuenta 2");

            $cuenta1->setSaldo(5000000);
            $cuenta1->setNombreTitular('Luis Izquierdo');
            $cuenta2->setSaldo(5000000);
            $cuenta2->setNombreTitular('Edwin Mosquera');
            ?>

            <th> Cuenta 1 datos iniciales</th>
            <th> Cuenta 2 datos iniciales</th>
            <tr>
                <td> <?php $cuenta1->consultar() ?></td> 
                <td> <?php $cuenta2->consultar() ?></td> 
            </tr>
        </table>
        <?php
        $cuenta1->retirar(500000);
        $cuenta2->consignar(500000);
        ?>       
        <br/>Retirar 500000 en cuenta 1 y consignar en cuenta 2
        <br/>----------------------------------------------------------------------------------------<br/><br/>
        <table border='1'>
            <tr>
                <td><?php $cuenta1->consultar() ?></td>
                <td><?php $cuenta2->consultar() ?></td>
            </tr>
        </table>
        <?php
        $cuenta1->transferir(800000, $cuenta2);
        ?>
        <br/>Transferir 800000 desde la cuenta 1 a la cuenta 2
        <br/>-----------------------------------------------------------------------------------------<br/><br/>
        <table border='1'>
            <tr>
                <td><?php $cuenta1->consultar() ?></td>
                <td><?php $cuenta2->consultar() ?></td>
            </tr>
        </table>

    </body>
</html>
