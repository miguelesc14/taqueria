<?php
require_once("sistema.php");
class tipo_platillo extends Sistema
{
    public function flash($color, $msg)
    {
        include('views/flash.php');
    }
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from tipo_platillo";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select * from tipo_platillo where id_tipoplatillo=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }


    public function new ($data)
    {
        $this->db();
        $sql = "INSERT INTO tipo_platillo (nombre, descripcion) 
        VALUES (:nombre, :descripcion)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $st->bindParam(":descripcion", $data['descripcion'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE tipo_platillo 
        SET nombre = :nombre,
         descripcion = :descripcion
         where id_tipoplatillo= :id_tipoplatillo";
        $st = $this->db->prepare($sql);
        $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $st->bindParam(":descripcion", $data['descripcion'], PDO::PARAM_STR);
        $st->bindParam(":id_tipoplatillo", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM tipo_platillo WHERE id_tipoplatillo=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$tipo_platillo  = new tipo_platillo;
?>