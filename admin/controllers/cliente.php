<?php
require_once("sistema.php");
class Cliente extends Sistema
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
            ifnull(e.primer_apellido,""), " ", ifnull(e.segundo_apellido,"")) as cliente, 
            e.*, u.*, g.genero
            from cliente e
            inner join genero g on e.id_genero = g.id_genero
            inner join usuario u on e.id_usuario = u.id_usuario';
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = 'select concat(e.nombre, " ",ifnull(e.segundo_nombre,""), " ", 
            ifnull(e.primer_apellido,""), " ", ifnull(e.segundo_apellido,"")) as cliente, 
            e.*, u.*, g.genero
            from cliente e
            inner join genero g on e.id_genero = g.id_genero
            inner join usuario u on e.id_usuario = u.id_usuario
            where e.id_cliente=:id';
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }

    public function getbyclient($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = 'select concat(e.nombre, " ",ifnull(e.segundo_nombre,""), " ", 
            ifnull(e.primer_apellido,""), " ", ifnull(e.segundo_apellido,"")) as cliente, 
            e.*, u.*, g.genero
            from cliente e
            inner join genero g on e.id_genero = g.id_genero
            inner join usuario u on e.id_usuario = u.id_usuario';
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = 'select concat(e.nombre, " ",ifnull(e.segundo_nombre,""), " ", 
            ifnull(e.primer_apellido,""), " ", ifnull(e.segundo_apellido,"")) as cliente, 
            e.*, u.*, g.genero
            from cliente e
            inner join genero g on e.id_genero = g.id_genero
            inner join usuario u on e.id_usuario = u.id_usuario
            where e.id_usuario=:id';
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }

    public function getUC($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = 'select * from ubicacion_cliente';
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = 'select uc.*,cu.ciudad,c.id_cliente,u.id_usuario from ubicacion_cliente uc
            inner join cliente c on uc.id_cliente = c.id_cliente
            inner join usuario u on u.id_usuario = c.id_usuario
            inner join ciudad cu on cu.id_ciudad = uc.id_ciudad
            where c.id_usuario=:id';
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
        try {
            $this->db->beginTransaction();
            $hora_actual = date("h:i:s A");
            $fecha_actual = date("Y-m-d H:i:s");
            if(isset($data['primer_apellido'])){
                $nombrearchivo = str_replace(" ", "_", $data['nombre'].$data['primer_apellido'].$hora_actual);
            }else{
                $nombrearchivo = str_replace(" ", "_", $data['nombre'].$hora_actual);
            }
            $nombrearchivo = substr($nombrearchivo, 0, 20);
        $sql = "INSERT INTO cliente (nombre, segundo_nombre, primer_apellido, segundo_apellido,
        fecha_nacimiento, id_genero, fecha_registro, id_usuario) 
        VALUES (:nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :fecha_nacimiento, 
        :id_genero, :fecha_registro, :id_usuario)";

$sesubio = $this->uploadfile("fotografia", "images/", $nombrearchivo);

if ($sesubio) {
    $sql = "INSERT INTO cliente (nombre, segundo_nombre, primer_apellido, segundo_apellido,
        fecha_nacimiento, id_genero, fecha_registro, imagen_perfil, id_usuario) 
        VALUES (:nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :fecha_nacimiento, 
        :id_genero, :fecha_registro, :imagen_perfil, :id_usuario)";
}

        $st = $this->db->prepare($sql);
        $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $st->bindParam(":segundo_nombre", $data['segundo_nombre'], PDO::PARAM_STR);
        $st->bindParam(":primer_apellido", $data['primer_apellido'], PDO::PARAM_STR);
        $st->bindParam(":segundo_apellido", $data['segundo_apellido'], PDO::PARAM_STR);
        $st->bindParam(":fecha_nacimiento", $data['fecha_nacimiento'], PDO::PARAM_STR); 
        $st->bindParam(":id_genero", $data['id_genero'], PDO::PARAM_INT);
        $st->bindParam(":fecha_registro", $fecha_actual, PDO::PARAM_STR);;
        if ($sesubio) {
            $st->bindParam(":imagen_perfil", $sesubio, PDO::PARAM_STR);
            }
        $st->bindParam(":id_usuario", $data['id_usuario'], PDO::PARAM_INT);


        $sql2 = "INSERT INTO usuario_puesto (id_usuario, id_puesto) VALUES (:id_usuario, :id_puesto)";
        $st2 = $this->db->prepare($sql2);
        $var = 6;
        $st2->bindParam(":id_puesto", $var, PDO::PARAM_INT);
        $st2->bindParam(":id_usuario", $data['id_usuario'], PDO::PARAM_INT);

        $st->execute();
        $st2->execute();

        $rc = $st->rowCount();
        $this->db->commit();
    } catch (PDOException $Exception) {
        $rc = 0;
        //print "DBA FAIL:" . $Exception->getMessage();
        $this->db->rollBack();
        
    }
        return $rc;
    }

    public function newUC ($data)
    {
        $this->db();
        $sql = "INSERT INTO ubicacion_cliente (id_cliente,id_ciudad,direccion) VALUES (:id_cliente,:id_ciudad,:direccion)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_cliente", $data['id_cliente'], PDO::PARAM_INT);
        $st->bindParam(":id_ciudad", $data['id_ciudad'], PDO::PARAM_INT);
        $st->bindParam(":direccion", $data['direccion'], PDO::PARAM_STR);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }


    public function edit($id, $data)
    {
        $this->db();
        try {
            $this->db->beginTransaction();
            $hora_actual = date("h:i:s");
            if(isset($data['primer_apellido'])){
                $nombrearchivo = str_replace(" ", "_", $data['nombre'].$data['primer_apellido'].$hora_actual);
            }else{
                $nombrearchivo = str_replace(" ", "_", $data['nombre'].$hora_actual);
            }
            $nombrearchivo = substr($nombrearchivo, 0, 20);
            
        $sql = "UPDATE cliente 
        SET nombre = :nombre,
        segundo_nombre = :segundo_nombre,
        primer_apellido = :primer_apellido,
        segundo_apellido = :segundo_apellido,
        fecha_nacimiento = :fecha_nacimiento, 
        id_genero = :id_genero, 
        fecha_registro = :fecha_registro,
        id_usuario = :id_usuario
         where id_cliente= :id_cliente";

        $sesubio = $this->uploadfile("fotografia", "../images/accounts/", $nombrearchivo);
        if ($sesubio) {
            $sql = "UPDATE cliente 
        SET nombre = :nombre,
        segundo_nombre = :segundo_nombre,
        primer_apellido = :primer_apellido,
        segundo_apellido = :segundo_apellido,
        fecha_nacimiento = :fecha_nacimiento, 
        id_genero = :id_genero, 
        fecha_registro = :fecha_registro,
        imagen_perfil =:imagen_perfil,
        id_usuario = :id_usuario
         where id_cliente= :id_cliente";
        }

         $st = $this->db->prepare($sql);
         $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
         $st->bindParam(":segundo_nombre", $data['segundo_nombre'], PDO::PARAM_STR);
         $st->bindParam(":primer_apellido", $data['primer_apellido'], PDO::PARAM_STR);
         $st->bindParam(":segundo_apellido", $data['segundo_apellido'], PDO::PARAM_STR);
         $st->bindParam(":fecha_nacimiento", $data['fecha_nacimiento'], PDO::PARAM_STR); 
         $st->bindParam(":id_genero", $data['id_genero'], PDO::PARAM_INT);
         $st->bindParam(":fecha_registro", $data['fecha_registro'], PDO::PARAM_STR);;
         if ($sesubio) {
         $st->bindParam(":imagen_perfil", $sesubio, PDO::PARAM_STR);
         }
         $st->bindParam(":id_usuario", $data['id_usuario'], PDO::PARAM_INT);
       $st->bindParam(":id_cliente", $id, PDO::PARAM_INT);
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

    public function editbyuser($id, $data)
    {
        $this->db();
        try {
            $this->db->beginTransaction();
            $hora_actual = date("h:i:s");
            if(isset($data['primer_apellido'])){
                $nombrearchivo = str_replace(" ", "_", $data['nombre'].$data['primer_apellido'].$hora_actual);
            }else{
                $nombrearchivo = str_replace(" ", "_", $data['nombre'].$hora_actual);
            }
            $nombrearchivo = substr($nombrearchivo, 0, 20);
            
        $sql = "UPDATE cliente 
        SET nombre = :nombre,
        segundo_nombre = :segundo_nombre,
        primer_apellido = :primer_apellido,
        segundo_apellido = :segundo_apellido,
        fecha_nacimiento = :fecha_nacimiento, 
        id_genero = :id_genero, 
         where id_cliente= :id_cliente";

        $sesubio = $this->uploadfile("fotografia", "../images/accounts/", $nombrearchivo);
        if ($sesubio) {
            $sql = "UPDATE cliente 
        SET nombre = :nombre,
        segundo_nombre = :segundo_nombre,
        primer_apellido = :primer_apellido,
        segundo_apellido = :segundo_apellido,
        fecha_nacimiento = :fecha_nacimiento, 
        id_genero = :id_genero, 
        imagen_perfil =:imagen_perfil,
         where id_cliente= :id_cliente";
        }

         $st = $this->db->prepare($sql);
         $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
         $st->bindParam(":segundo_nombre", $data['segundo_nombre'], PDO::PARAM_STR);
         $st->bindParam(":primer_apellido", $data['primer_apellido'], PDO::PARAM_STR);
         $st->bindParam(":segundo_apellido", $data['segundo_apellido'], PDO::PARAM_STR);
         $st->bindParam(":fecha_nacimiento", $data['fecha_nacimiento'], PDO::PARAM_STR); 
         $st->bindParam(":id_genero", $data['id_genero'], PDO::PARAM_INT);
         if ($sesubio) {
         $st->bindParam(":imagen_perfil", $sesubio, PDO::PARAM_STR);
         }
       $st->bindParam(":id_cliente", $id, PDO::PARAM_INT);
       $st->execute();


        $rc = $st->rowCount();
        $this->db->commit();
    } catch (PDOException $Exception) {
        $rc = 0;
        //print "DBA FAIL:" . $Exception->getMessage();
        $this->db->rollBack();
        
    }

        $rc = $st->rowCount();
        return $rc;
    }

    public function editUC($id, $data)
    {
        $this->db();
        $sql = "UPDATE ubicacion_cliente SET id_cliente =:id_cliente,
        id_ciudad =:id_ciudad,direccion =:direccion where id_ubiclient= :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":id_cliente", $data['id_cliente'], PDO::PARAM_INT);
        $st->bindParam(":id_ciudad", $data['id_ciudad'], PDO::PARAM_INT);
        $st->bindParam(":direccion", $data['direccion'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function delete($id)
    {
        $this->db();
        try {
        $this->db->beginTransaction();

        $sql2 = "DELETE FROM ubicacion_cliente WHERE id_cliente=:id";
        $st2 = $this->db->prepare($sql2);
        $st2->bindParam(":id", $id, PDO::PARAM_INT);

        $sql3 = "DELETE FROM pedido WHERE id_cliente=:id";
        $st3 = $this->db->prepare($sql3);
        $st3->bindParam(":id", $id, PDO::PARAM_INT);

        $sql = "DELETE FROM cliente WHERE id_cliente=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);

        $st3->execute();
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

    public function deletebyuser($id,$id2)
    {
        $this->db();
        try {
        $this->db->beginTransaction();

        $sql2 = "DELETE FROM ubicacion_cliente WHERE id_cliente=:id";
        $st2 = $this->db->prepare($sql2);
        $st2->bindParam(":id", $id, PDO::PARAM_INT);

        $sql3 = "DELETE FROM pedido WHERE id_cliente=:id";
        $st3 = $this->db->prepare($sql3);
        $st3->bindParam(":id", $id, PDO::PARAM_INT);

        $sql = "DELETE FROM cliente WHERE id_cliente=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);

        $sql4 = "DELETE FROM usuario_puesto WHERE id_usuario=:id";
        $st4 = $this->db->prepare($sql4);
        $st4->bindParam(":id", $id2, PDO::PARAM_INT);

        $sql5 = "DELETE FROM usuario WHERE id_usuario=:id";
        $st5 = $this->db->prepare($sql5);
        $st5->bindParam(":id", $id2, PDO::PARAM_INT);

        $st3->execute();
        $st2->execute();
        $st->execute();
        $st4->execute();
        $st5->execute();

        $rc = $st->rowCount();
        $this->db->commit();
    } catch (PDOException $Exception) {
        $rc = 0;
        print "DBA FAIL:" . $Exception->getMessage();
        $this->db->rollBack();
    }
        return $rc;
    }

    public function deleteUC($id)
    {
        $this->db();
        $sql = "DELETE FROM ubicacion_cliente WHERE id_ubiclient=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$cliente  = new Cliente;
?>