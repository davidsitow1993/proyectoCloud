<?php

require_once '../model/ContactoModel.php';
session_start();
$contacto = new ContactoModel();
$opcion = $_REQUEST['opcion'];

switch ($opcion) {
    case "listar":
        $listado = $contacto->getContactos();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;
    case "insertar":
        $nombres = $_REQUEST['nombres'];
        $celular = $_REQUEST['celular'];
        $direccion = $_REQUEST['direccion'];
        $contacto->insertarContacto($nombres,$celular,$direccion);
        $listado = $contacto->getContactos();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;
    case "eliminar":
        $idContacto = $_REQUEST['idContacto'];
        $contacto->eliminarContacto($idContacto);
        $listado = $contacto->getContactos();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;
    default:
         header('Location: ../view/index.php');
}
