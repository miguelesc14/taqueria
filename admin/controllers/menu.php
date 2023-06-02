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
        $sql = "INSERT INTO platillo (nombre, precio, id_tipoplatillo, id_ingsec) 
        VALUES (:nombre, :precio, :id_tipoplatillo, :id_ingsec)";
        $st = $this->db->prepare($sql);
        $ssaa= $dataTipo[$data['id_tipoplatillo']-1]['nombre'].' de '.$dataIngSec[$data['id_ingsec']-1]['nombre'];
        $st->bindParam(":nombre", $ssaa, PDO::PARAM_STR);
        $st->bindParam(":precio", $data['precio'], PDO::PARAM_STR);
        $st->bindParam(":id_tipoplatillo", $data['id_tipoplatillo'], PDO::PARAM_INT);
        $st->bindParam(":id_ingsec", $data['id_ingsec'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data,$dataTipo,$dataIngSec)
    {
        $this->db();
        $sql = "UPDATE platillo 
        SET nombre = :nombre,
        precio = :precio,
        id_tipoplatillo = :id_tipoplatillo,
        id_ingsec = :id_ingsec
         where id_platillo= :id_platillo";
        $st = $this->db->prepare($sql);
        $ssaa= $dataTipo[$data['id_tipoplatillo']-1]['nombre'].' de '.$dataIngSec[$data['id_ingsec']-1]['nombre'];
        $st->bindParam(":nombre", $ssaa, PDO::PARAM_STR);
        $st->bindParam(":precio", $data['precio'], PDO::PARAM_STR);
        $st->bindParam(":id_tipoplatillo", $data['id_tipoplatillo'], PDO::PARAM_INT);
        $st->bindParam(":id_ingsec", $data['id_ingsec'], PDO::PARAM_INT);
        $st->bindParam(":id_platillo", $data['id_platillo'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
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