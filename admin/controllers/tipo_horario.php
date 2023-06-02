<?php
require_once("sistema.php");
class Tipo_horario extends Sistema
{
    public function flash($color, $msg)
    {
        include('views/flash.php');
    }
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from tipo_horario";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select * from tipo_horario where id_tipohorario=:id";
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
        $sql = "INSERT INTO tipo_horario (nombre, dias, hora) 
        VALUES (:nombre, :dias, :hora)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $st->bindParam(":dias", $data['dias'], PDO::PARAM_STR);
        $st->bindParam(":hora", $data['hora'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE tipo_horario 
        SET nombre = :nombre,
         dias = :dias, 
         hora = :hora
         where id_tipohorario= :id_tipohorario";
        $st = $this->db->prepare($sql);
        $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $st->bindParam(":dias", $data['dias'], PDO::PARAM_STR);
        $st->bindParam(":hora", $data['hora'], PDO::PARAM_STR);
        $st->bindParam(":id_tipohorario", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM tipo_horario WHERE id_tipohorario=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$tipo_horario  = new Tipo_horario;
?>