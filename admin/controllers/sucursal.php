<?php
require_once("sistema.php");
class Sucursal extends Sistema
{
    public function flash($color, $msg)
    {
        include('views/flash.php');
    }
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select *, s.nombre as sucurs, th.nombre as tipo,
            th.dias, th.hora from sucursal s
            inner join tipo_horario th on s.id_tipohorario = th.id_tipohorario
            inner join ciudad c on s.id_ciudad = c.id_ciudad
            inner join estado e on c.id_estado = e.id_estado
            inner join pais p on e.id_pais = p.id_pais";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select *, s.nombre as sucurs, th.nombre from sucursal s
            inner join tipo_horario th on s.id_tipohorario = th.id_tipohorario
            inner join ciudad c on s.id_ciudad = c.id_ciudad
            inner join estado e on c.id_estado = e.id_estado
            inner join pais p on e.id_pais = p.id_pais
            where id_sucursal=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }

    public function getbyIP($id = null)
    {
        $this->db();

            $sql = "select s.id_sucursal, s.nombre as sucurs from sucursal s
            inner join ip_sucursal ip on s.id_sucursal = ip.id_sucursal
            where id_sucursal=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }


    public function new ($data)
    {
        $this->db();
        $sql = "INSERT INTO sucursal (nombre, direccion, id_tipohorario, id_ciudad, mapa) 
        VALUES (:nombre, :direccion, :id_tipohorario, :id_ciudad, :mapa)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $st->bindParam(":direccion", $data['direccion'], PDO::PARAM_STR);
        $st->bindParam(":id_tipohorario", $data['id_tipohorario'], PDO::PARAM_INT);
        $st->bindParam(":id_ciudad", $data['id_ciudad'], PDO::PARAM_INT);
        $st->bindParam(":mapa", $data['mapa'], PDO::PARAM_STR);
        $st->execute();

        

        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE sucursal 
        SET nombre = :nombre,
        direccion = :direccion,
        id_tipohorario = :id_tipohorario,
        id_ciudad = :id_ciudad,
        mapa = :mapa
         where id_sucursal= :id_sucursal";
        $st = $this->db->prepare($sql);
        $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $st->bindParam(":direccion", $data['direccion'], PDO::PARAM_STR);
        $st->bindParam(":id_tipohorario", $data['id_tipohorario'], PDO::PARAM_STR);
        $st->bindParam(":id_ciudad", $data['id_ciudad'], PDO::PARAM_STR);
        $st->bindParam(":mapa", $data['mapa'], PDO::PARAM_STR);
        $st->bindParam(":id_sucursal", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        try {
            $this->db->beginTransaction();

            $sql2 = "DELETE FROM compl_sucursal WHERE id_sucursal=:id";
            $st2 = $this->db->prepare($sql);
            $st2->bindParam(":id", $id, PDO::PARAM_INT);

            $sql3 = "DELETE FROM ip_sucursal WHERE id_sucursal=:id";
            $st3 = $this->db->prepare($sql);
            $st3->bindParam(":id", $id, PDO::PARAM_INT);

            $sql3 = "DELETE FROM ip_sucursal WHERE id_sucursal=:id";
            $st3 = $this->db->prepare($sql);
            $st3->bindParam(":id", $id, PDO::PARAM_INT);

            $sql = "DELETE FROM sucursal WHERE id_sucursal=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            
            $st2->execute();
            $st3->execute();
            $st4->execute();
            $st->execute();

            $rc = $st->rowCount();
            $this->db->commit();
        } catch (PDOException $Exception) {
            $rc = 0;
            print "DBA FAIL:" . $Exception->getMessage();
            die();
            $this->db->rollBack();
        }
        return $rc;
    }

    public function getCorreo($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from correo_sucursal";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select * from correo_sucursal where id_sucursal=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function getCorreoSu($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from correo_sucursal";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select * from correo_sucursal where id_sucurcorreo =:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function newCorreo($data2)
    {
        $this->db();
        $sql = "INSERT INTO correo_sucursal (id_sucursal, correo) 
        VALUES (:id_sucursal, :correo)";
        $st = $this->db->prepare($sql);
        
        $st->bindParam(":id_sucursal", $data['id_sucursal'], PDO::PARAM_INT);
        $st->bindParam(":correo", $data['correo'], PDO::PARAM_STR);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function editCorreo($id, $data)
    {
        $this->db();
        $sql = "UPDATE correo_sucursal 
        SET id_sucursal = :id_sucursal,
        correo = :correo
         where id_sucurcorreo = :id_sucurcorreo";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_sucursal", $data['id_sucursal'], PDO::PARAM_INT);
        $st->bindParam(":correo", $data['correo'], PDO::PARAM_STR);
        $st->bindParam(":id_sucurcorreo", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function deleteCorreo($id)
    {
        $this->db();
            $sql = "DELETE FROM correo_sucursal WHERE id_sucurcorreo=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();

            $rc = $st->rowCount();
        return $rc;
    }

    public function getTelefono($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from telefono_sucursal";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select * from telefono_sucursal where id_sucursal=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function getTelefonoSu($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from telefono_sucursal";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select * from telefono_sucursal where id_sucurtel=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function newTelefono($data2)
    {
        $this->db();
        $sql = "INSERT INTO telefono_sucursal (id_sucursal, telefono) 
        VALUES (:id_sucursal, :telefono)";
        $st = $this->db->prepare($sql);
        
        $st->bindParam(":id_sucursal", $data['id_sucursal'], PDO::PARAM_INT);
        $st->bindParam(":telefono", $data['telefono'], PDO::PARAM_STR);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function editTelefono($id, $data)
    {
        $this->db();
        $sql = "UPDATE telefono_sucursal 
        SET id_sucursal = :id_sucursal,
        telefono = :telefono
         where id_sucurtel = :id_sucurtel";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_sucursal", $data['id_sucursal'], PDO::PARAM_INT);
        $st->bindParam(":telefono", $data['telefono'], PDO::PARAM_STR);
        $st->bindParam(":id_sucurtel", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function deleteTelefono($id)
    {
        $this->db();
            $sql = "DELETE FROM telefono_sucursal WHERE id_sucurtel=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();

            $rc = $st->rowCount();
        return $rc;
    }

    
    public function getRed($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from red_sucursal r
            inner join red_social rs on r.id_red = rs.id_red";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select * from red_sucursal r
            inner join red_social rs on r.id_red = rs.id_red 
            where id_sucursal=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function getRedSu($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from red_sucursal";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select * from red_sucursal where id_sucurred=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function newRed($data2)
    {
        $this->db();
        $sql = "INSERT INTO red_sucursal (id_sucursal, id_red, enlace) 
        VALUES (:id_sucursal, :id_red, :enlace)";
        $st = $this->db->prepare($sql);
        
        $st->bindParam(":id_sucursal", $data['id_sucursal'], PDO::PARAM_INT);
        $st->bindParam(":id_red", $data['id_red'], PDO::PARAM_INT);
        $st->bindParam(":enlace", $data['enlace'], PDO::PARAM_STR);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function editRed($id, $data)
    {
        $this->db();
        $sql = "UPDATE red_sucursal 
        SET id_sucursal = :id_sucursal,
        id_red = :id_red,
        enlace = :enlace
         where id_sucurred = :id_sucurred";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_sucursal", $data['id_sucursal'], PDO::PARAM_INT);
        $st->bindParam(":id_red", $data['id_red'], PDO::PARAM_INT);
        $st->bindParam(":enlace", $data['enlace'], PDO::PARAM_STR);
        $st->bindParam(":id_sucurred", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function deleteRed($id)
    {
        $this->db();
            $sql = "DELETE FROM red_sucursal WHERE id_sucurred=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();

            $rc = $st->rowCount();
        return $rc;
    }
}
$sucursal  = new Sucursal;
?>