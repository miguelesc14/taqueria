<?php
require_once("sistema.php");
class Inventario extends Sistema
{
    public function flash($color, $msg)
    {
        include('views/flash.php');
    }
    public function getIP($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select ip.id_ipsucursal, ip.id_sucursal, ip.cantidad, s.id_sucursal, s.nombre as sucursal, i.nombre as ingrediente from ip_sucursal ip
            join sucursal s on ip.id_sucursal = s.id_sucursal
            join ingrediente_principal i on ip.id_ingprinc = i.id_ingprinc;";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select ip.id_ipsucursal, ip.id_sucursal, ip.cantidad, s.id_sucursal, s.nombre as sucursal, i.nombre as ingrediente 
            from ip_sucursal ip
            join sucursal s on ip.id_sucursal = s.id_sucursal
            join ingrediente_principal i on ip.id_ingprinc = i.id_ingprinc
            where ip.id_ipsucursal=:id";
            $st = $this->db->prepare($sql);
            
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }

    public function getIS($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select isd.id_issucursal, isd.id_sucursal, isd.cantidad, s.id_sucursal, s.nombre as sucursal, i.nombre as ingrediente from is_sucursal isd join sucursal s on isd.id_sucursal = s.id_sucursal join ingrediente_secundario i on isd.id_ingsec = i.id_ingsec";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select isd.id_issucursal, isd.id_sucursal, isd.cantidad, s.id_sucursal, s.nombre as sucursal, i.nombre as ingrediente 
            from is_sucursal isd join sucursal s on isd.id_sucursal = s.id_sucursal join ingrediente_secundario i on isd.id_ingsec = i.id_ingsec
            where isd.id_issucursal=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }

    public function getSucursal($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select s.id_sucursal, s.nombre as nombre from sucursal s";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select s.id_sucursal, s.nombre as nombre from sucursal s
            where s.id_sucursal=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }

    public function newIP($dataIP)
    {
        $this->db();
        $sql = "insert into ip_sucursal (id_ingprinc,id_sucursal , cantidad) values (:id_ingprinc,:id_sucursal ,:cantidad)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":cantidad", $dataIP['cantidad'], PDO::PARAM_INT);
        $st->bindParam(":id_sucursal", $dataIP['id_sucursal'], PDO::PARAM_INT);
        $st->bindParam(":id_ingprinc", $dataIP['id_ingprinc'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function newIS($dataIS)
    {
        $this->db();
        $sql = "insert into is_sucursal (id_ingsec, id_sucursal ,cantidad) values (:id_ingsec,:id_sucursal, :cantidad)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":cantidad", $dataIS['cantidad'], PDO::PARAM_INT);
        $st->bindParam(":id_sucursal", $dataIS['id_sucursal'], PDO::PARAM_INT);
        $st->bindParam(":id_ingsec", $dataIS['id_ingsec'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function editIP($id, $dataIP)
    {
        $this->db();
        $sql = "UPDATE ip_sucursal
        SET cantidad = :cantidad
         where id_ipsucursal= :id_ipsucursal";
        $st = $this->db->prepare($sql);
        $st->bindParam(":cantidad", $dataIP['cantidad'], PDO::PARAM_INT);
        $st->bindParam(":id_ipsucursal", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function editIS($id, $dataIS)
    {
        $this->db();
        $sql = "UPDATE is_sucursal
        SET cantidad = :cantidad
         where id_issucursal= :id_issucursal";
        $st = $this->db->prepare($sql);
        $st->bindParam(":cantidad", $dataIS['cantidad'], PDO::PARAM_INT);
        $st->bindParam(":id_issucursal", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    
    public function deleteIP($id){
        $this->db();
        $sql = "Delete from ip_sucursal where id_ipsucursal = :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function deleteIS($id){
        $this->db();
        $sql = "Delete from is_sucursal where id_issucursal = :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

}
$inventario  = new Inventario;
?>