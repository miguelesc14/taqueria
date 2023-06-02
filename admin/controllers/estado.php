<?php
require_once("sistema.php");
class Estado extends Sistema
{
    public function flash($color, $msg)
    {
        include('views/flash.php');
    }
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select e.*, p.pais 
            from estado e
            inner join pais p on e.id_pais = p.id_pais";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select e.*, p.pais 
            from estado e
            inner join pais p on e.id_pais = p.id_pais where id_estado=:id";
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
        $sql = "INSERT INTO estado (estado, id_pais) 
        VALUES (:estado, :id_pais)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":estado", $data['estado'], PDO::PARAM_STR);
        $st->bindParam(":id_pais", $data['id_pais'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE estado 
        SET estado = :estado,
        id_pais = :id_pais
         where id_estado= :id_estado";
        $st = $this->db->prepare($sql);
        $st->bindParam(":estado", $data['estado'], PDO::PARAM_STR);
        $st->bindParam(":id_estado", $id, PDO::PARAM_INT);
        $st->bindParam(":id_pais", $data['id_pais'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM estado WHERE id_estado=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$estado  = new Estado;
?>