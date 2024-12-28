<?php
require_once("sistema.php");
class Menu extends Sistema
{
    public function flash($color, $msg)
    {
        include('views/flash.php');
    }
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from platillo";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select * from platillo where id_platillo=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }

    public function getTipo($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from tipo_platillo";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select * from tipo_platillo where id_platillo=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }

    public function getIngSec($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from ingrediente_secundario";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select * from ingrediente_secundario where id_platillo=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }


    public function new ($data, $dataTipo,$dataIngSec)
    {
        $this->db();

        try {
            $this->db->beginTransaction();
            $hora_actual = date("h:i:s A");
            $fecha_actual = date("Y-m-d H:i:s");
                $nombrearchivo = str_replace(" ", "_", $dataTipo[0]['nombre'].$dataIngSec[0]['nombre'].$hora_actual);
            $nombrearchivo = substr($nombrearchivo, 0, 50);

        $sql = "INSERT INTO platillo (nombre, precio, id_tipoplatillo, id_ingsec) 
        VALUES (:nombre, :precio, :id_tipoplatillo, :id_ingsec)";

$sesubio = $this->uploadfile("fotografia", "images/menu/", $nombrearchivo);


if ($sesubio) {
    $sql = "INSERT INTO platillo (nombre, precio, imagen, id_tipoplatillo, id_ingsec) 
        VALUES (:nombre, :precio,:imagen, :id_tipoplatillo, :id_ingsec)";
}

        $st = $this->db->prepare($sql);
        $ssaa= $dataTipo[0]['nombre'].' de '.$dataIngSec[0]['nombre'];
        $st->bindParam(":nombre", $ssaa, PDO::PARAM_STR);
        $st->bindParam(":precio", $data['precio'], PDO::PARAM_STR);
        if ($sesubio) {
            $st->bindParam(":imagen", $sesubio, PDO::PARAM_STR);
            }
        $st->bindParam(":id_tipoplatillo", $data['id_tipoplatillo'], PDO::PARAM_INT);
        $st->bindParam(":id_ingsec", $data['id_ingsec'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        $this->db->commit();
    } catch (PDOException $Exception) {
        $rc = 0;
        //print "DBA FAIL:" . $Exception->getMessage();
        $this->db->rollBack();
        
    }
        return $rc;
    }
    public function edit($id, $data,$dataTipo,$dataIngSec)
    {
        $this->db();
        try {
            $this->db->beginTransaction();
            $hora_actual = date("h:i:s A");
            $fecha_actual = date("Y-m-d H:i:s");
                $nombrearchivo = str_replace(" ", "_", $dataTipo[0]['nombre'].$dataIngSec[0]['nombre'].$hora_actual);
            $nombrearchivo = substr($nombrearchivo, 0, 50);

        $sql = "UPDATE platillo 
        SET nombre = :nombre,
        precio = :precio,
        id_tipoplatillo = :id_tipoplatillo,
        id_ingsec = :id_ingsec
         where id_platillo= :id_platillo";

$sesubio = $this->uploadfile("fotografia", "images/menu/", $nombrearchivo);

if ($sesubio) {
    $sql = "UPDATE platillo 
        SET nombre = :nombre,
        precio = :precio,
        imagen = :imagen,
        id_tipoplatillo = :id_tipoplatillo,
        id_ingsec = :id_ingsec
         where id_platillo= :id_platillo";
}

        $st = $this->db->prepare($sql);
        $ssaa= $dataTipo[0]['nombre'].' de '.$dataIngSec[0]['nombre'];
        $st->bindParam(":nombre", $ssaa, PDO::PARAM_STR);
        $st->bindParam(":precio", $data['precio'], PDO::PARAM_STR);
        if ($sesubio) {
            $st->bindParam(":imagen", $sesubio, PDO::PARAM_STR);
            }
        $st->bindParam(":id_tipoplatillo", $data['id_tipoplatillo'], PDO::PARAM_INT);
        $st->bindParam(":id_ingsec", $data['id_ingsec'], PDO::PARAM_INT);
        $st->bindParam(":id_platillo", $data['id_platillo'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        $this->db->commit();
    } catch (PDOException $Exception) {
        $rc = 0;
        //print "DBA FAIL:" . $Exception->getMessage();
        $this->db->rollBack();
        
    }
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM platillo WHERE id_platillo=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$menu  = new Menu;
?>