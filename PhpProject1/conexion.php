<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function conectarse($host = 'localhost', $user = 'root', $pass = '', $bd = 'progresard') { //me conecto a la bd 
    if (!$link = mysql_connect('localhost', 'root', '')) {
        echo'No se puedo conectar';
        exit();
    }
    if (!mysql_select_db($bd)) {// selecciona la bd
        echo'Error al seleccionar la base de datos';
        exit();
    }

    return $link;
}

?>
