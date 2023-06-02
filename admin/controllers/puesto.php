<?php
require_once(__DIR__."/sistema.php");
class Puesto extends Sistema
{
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from puesto";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select * from puesto where id_puesto=:id";
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
        $sql = "INSERT INTO puesto (puesto) VALUES (:puesto)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":puesto", $data['puesto'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE puesto SET puesto = :puesto where id_puesto= :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":puesto", $data['puesto'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM puesto WHERE id_puesto=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    
    
    public function getPrivilegio($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from privilegio p 
            left join puesto_privilegio rp on rp.id_privilegio = p.id_privilegio
            right join puesto r on r.id_puesto = rp.id_puesto";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from privilegio p 
            left join puesto_privilegio rp on rp.id_privilegio = p.id_privilegio
            right join puesto r on r.id_puesto = rp.id_puesto
            where r.id_puesto=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    

    public function getPuestoPrivilegio($id_puesto=null, $id_priv=null)
    {
        $this->db();
        if (is_null($id_puesto) || is_null($id_priv)) {
            $sql = "select * from puesto_privilegio";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from puesto_privilegio
            WHERE id_puesto=:id_puesto and id_privilegio=:id_privilegio";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id_puesto", $id_puesto, PDO::PARAM_INT);
        $st->bindParam(":id_privilegio", $id_priv, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
    public function validarPuestoPrivilegio($id_puesto, $id_priv){
        $val = $this->getPuestoPrivilegio($id_puesto,$id_priv);
        return $val;
    }
    public function deletePrivilegio($id_puesto, $id_priv)
    {
        $this->db();
        $sql = "DELETE FROM puesto_privilegio WHERE id_puesto=:id_puesto and id_privilegio=:id_privilegio";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_puesto", $id_puesto, PDO::PARAM_INT);
        $st->bindParam(":id_privilegio", $id_priv, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function newPrivilegio($id, $data)
    {
        $this->db();
        $sql = "INSERT INTO puesto_privilegio (id_puesto, id_privilegio) VALUES (:id_puesto, :id_privilegio)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_puesto", $data['id_puesto'], PDO::PARAM_INT);
        $st->bindParam(":id_privilegio", $data['id_privilegio'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function editPrivilegio($id, $data)
    {
        $this->db();
        $sql = "update puesto_privilegio set id_puesto =:id_puesto, id_privilegio =:id_usuario
        WHERE id_puPriv = :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_puesto", $data['id_puesto'], PDO::PARAM_INT);
        $st->bindParam(":id_usuario", $data['id_privilegio'], PDO::PARAM_INT);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

}
$puesto = new Puesto;
?>