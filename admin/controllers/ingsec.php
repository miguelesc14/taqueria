<?php
require_once("sistema.php");
class Ingrediente_secundario extends Sistema
{
    public function flash($color, $msg)
    {
        include('views/flash.php');
    }
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from ingrediente_secundario";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select * from ingrediente_secundario where id_ingsec=:id";
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
        $sql = "INSERT INTO ingrediente_secundario (nombre) 
        VALUES (:nombre)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE ingrediente_secundario 
        SET nombre = :nombre
         where id_ingsec= :id_ingsec";
        $st = $this->db->prepare($sql);
        $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $st->bindParam(":id_ingsec", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        try {
        $this->db->beginTransaction();

        $sql = "DELETE FROM ingrediente_secundario WHERE id_ingsec=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        

        $st->execute();

        $rc = $st->rowCount();
        $this->db->commit();
        } catch (PDOException $Exception) {
            $rc = 0;
            print "DBA FAIL:" . $Exception->getMessage()."";
            print "Borre todos los registros (platillos, pedidos, etc) que usen este ingrediente, es riesgoso";
            $this->db->rollBack();
        }
        return $rc;
    }
}
$ingrediente_secundario  = new Ingrediente_secundario;
?>