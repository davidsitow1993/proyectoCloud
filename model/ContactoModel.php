<?php

include_once 'Database.php';
include_once 'Contacto.php';

class ContactoModel {

    public function getContactos() {
        $pdo = Database::connect();
        $sql = "select * from contactos order by id_contacto";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $res) {
            $contacto = new Contacto($res['id_contacto'], $res['nombres'], $res['celular'], $res['direccion']);
            array_push($listado, $contacto);
        }
        Database::disconnect();
        return $listado;
    }

    public function insertarContacto($nombres,$celulas,$direccion) {
        $pdo = Database::connect();
        $sql = "insert into contactos(nombres,celular,direccion) values(?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($nombres,$celulas,$direccion));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }

        Database::disconnect();
    }
    
    public function eliminarContacto($idContacto) {
        //Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from contactos where id_contacto=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($idContacto));
        Database::disconnect();
    }
}
