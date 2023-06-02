<?php
require_once("sistema.php");
class Personal extends Sistema
{
    public function flash($color, $msg)
    {
        include('views/flash.php');
    }
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = 'select concat(e.nombre, " ",ifnull(e.segundo_nombre,""), " ", 
            ifnull(e.primer_apellido,""), " ", ifnull(e.segundo_apellido,"")) as personal, 
            e.*, u.*, g.genero, s.nombre as sucursal, c.*, es.*, p.*
            from personal e
            inner join genero g on e.id_genero = g.id_genero
            inner join usuario u on e.id_usuario = u.id_usuario
            inner join sucursal s on s.id_sucursal = e.id_sucursal
            inner join ciudad c on c.id_ciudad = e.id_ciudad
            inner join estado es on es.id_estado = c.id_estado
            inner join pais p on p.id_pais = es.id_pais';
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = 'select concat(e.nombre, " ",ifnull(e.segundo_nombre,""), " ", 
            ifnull(e.primer_apellido,""), " ", ifnull(e.segundo_apellido,"")) as personal, 
            e.*, u.*, g.genero, s.nombre as sucursal, c.*, es.*, p.*
            from personal e
            inner join genero g on e.id_genero = g.id_genero
            inner join usuario u on e.id_usuario = u.id_usuario
            inner join sucursal s on s.id_sucursal = e.id_sucursal
            inner join ciudad c on c.id_ciudad = e.id_ciudad
            inner join estado es on es.id_estado = c.id_estado
            inner join pais p on p.id_pais = es.id_pais
            where e.id_personal=:id';
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }

    public function getbyAdmin($id)
    {
        $this->db();

            $sql = 'select concat(e.nombre, " ",ifnull(e.segundo_nombre,""), " ", 
            ifnull(e.primer_apellido,""), " ", ifnull(e.segundo_apellido,"")) as personal, 
            e.*, u.*, g.genero, s.nombre as sucursal, c.*, es.*, p.*
            from personal e
            inner join genero g on e.id_genero = g.id_genero
            inner join usuario u on e.id_usuario = u.id_usuario
            inner join sucursal s on s.id_sucursal = e.id_sucursal
            inner join ciudad c on c.id_ciudad = e.id_ciudad
            inner join estado es on es.id_estado = c.id_estado
            inner join pais p on p.id_pais = es.id_pais
            where u.id_usuario=:id';
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function new ($data)
    {
        $this->db();
        if (empty($data['foto'])) {
        $sql = "INSERT INTO personal (nombre, segundo_nombre, primer_apellido, segundo_apellido, id_genero,
        fecha_nacimiento,  fecha_contratacion, RFC, CURP, id_usuario, id_sucursal, id_ciudad) 
        VALUES (:nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, 
        :id_genero, :fecha_nacimiento,  :fecha_contratacion, :RFC, :CURP, :id_usuario, :id_sucursal, :id_ciudad)";
        }else{
            $sql = "INSERT INTO personal (nombre, segundo_nombre, primer_apellido, segundo_apellido, id_genero,
            fecha_nacimiento,  fecha_contratacion, RFC, CURP, imagen_perfil, id_usuario, id_sucursal, id_ciudad) 
            VALUES (:nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, 
            :id_genero, :fecha_nacimiento,  :fecha_contratacion, :RFC, :CURP, :imagen_perfil, :id_usuario, :id_sucursal, :id_ciudad)";
        }
        $st = $this->db->prepare($sql);
        $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $st->bindParam(":segundo_nombre", $data['segundo_nombre'], PDO::PARAM_STR);
        $st->bindParam(":primer_apellido", $data['primer_apellido'], PDO::PARAM_STR);
        $st->bindParam(":segundo_apellido", $data['segundo_apellido'], PDO::PARAM_STR);
        $st->bindParam(":id_genero", $data['id_genero'], PDO::PARAM_INT);
        $st->bindParam(":fecha_nacimiento", $data['fecha_nacimiento'], PDO::PARAM_STR);        
        $st->bindParam(":fecha_contratacion", $data['fecha_contratacion'], PDO::PARAM_STR);
        $st->bindParam(":RFC", $data['RFC'], PDO::PARAM_STR);
        $st->bindParam(":CURP", $data['CURP'], PDO::PARAM_STR);
        if (!empty($data['foto'])) {
        $st->bindParam(":imagen_perfil", $data['foto'], PDO::PARAM_LOB);
        }
        $st->bindParam(":id_usuario", $data['id_usuario'], PDO::PARAM_INT);
        $st->bindParam(":id_sucursal", $data['id_sucursal'], PDO::PARAM_INT);
        $st->bindParam(":id_ciudad", $data['id_ciudad'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        if (empty($data['foto'])) {
        $sql = "UPDATE personal 
        SET nombre = :nombre,
        segundo_nombre = :segundo_nombre,
        primer_apellido = :primer_apellido,
        segundo_apellido = :segundo_apellido,
        id_genero = :id_genero,
        fecha_nacimiento = :fecha_nacimiento,  
        fecha_contratacion = :fecha_contratacion,
        RFC = :RFC, 
        CURP = :CURP,
        id_usuario = :id_usuario,
        id_sucursal = :id_sucursal,
        id_ciudad = :id_ciudad
        where id_personal= :id_personal";
        }else{
            $sql = "UPDATE personal 
        SET nombre = :nombre,
        segundo_nombre = :segundo_nombre,
        primer_apellido = :primer_apellido,
        segundo_apellido = :segundo_apellido,
        id_genero = :id_genero,
        fecha_nacimiento = :fecha_nacimiento,  
        fecha_contratacion = :fecha_contratacion,
        RFC = :RFC, 
        CURP = :CURP,
        imagen_perfil = :imagen_perfil,
        id_usuario = :id_usuario,
        id_sucursal = :id_sucursal,
        id_ciudad = :id_ciudad
         where id_personal= :id_personal";
        }
         $st = $this->db->prepare($sql);
       $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
       $st->bindParam(":segundo_nombre", $data['segundo_nombre'], PDO::PARAM_STR);
       $st->bindParam(":primer_apellido", $data['primer_apellido'], PDO::PARAM_STR);
       $st->bindParam(":segundo_apellido", $data['segundo_apellido'], PDO::PARAM_STR);
       $st->bindParam(":id_genero", $data['id_genero'], PDO::PARAM_INT);
       $st->bindParam(":fecha_nacimiento", $data['fecha_nacimiento'], PDO::PARAM_STR);        
       $st->bindParam(":fecha_contratacion", $data['fecha_contratacion'], PDO::PARAM_STR);
       $st->bindParam(":RFC", $data['RFC'], PDO::PARAM_STR);
       $st->bindParam(":CURP", $data['CURP'], PDO::PARAM_STR);
       if (!empty($data['foto'])) {
        $st->bindParam(":imagen_perfil", $data['foto'], PDO::PARAM_LOB);
        }
       $st->bindParam(":id_usuario", $data['id_usuario'], PDO::PARAM_INT);
       $st->bindParam(":id_sucursal", $data['id_sucursal'], PDO::PARAM_INT);
       $st->bindParam(":id_ciudad", $data['id_ciudad'], PDO::PARAM_INT);
       $st->bindParam(":id_personal", $id, PDO::PARAM_INT);
       $st->execute();


        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        try {
        $this->db->beginTransaction();

        $sql2 = "DELETE FROM personal_pedido WHERE id_personal=:id";
        $st2 = $this->db->prepare($sql2);
        $st2->bindParam(":id", $id, PDO::PARAM_INT);

        $sql = "DELETE FROM personal WHERE id_personal=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);

        $st2->execute();
        $st->execute();

        $rc = $st->rowCount();
        $this->db->commit();
    } catch (PDOException $Exception) {
        $rc = 0;
        print "DBA FAIL:" . $Exception->getMessage();
        $this->db->rollBack();
    }
        return $rc;
    }
}
$personal  = new Personal;
?>