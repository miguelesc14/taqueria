<?php
require_once("sistema.php");
class Pedido extends Sistema
{

    public function flash($color, $msg)
    {
        include('views/flash.php');
    }
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = 'SELECT p.id_pedido, p.hora_pedido, p.comentario_general, concat(e.nombre, " ",ifnull(e.segundo_nombre,""), " ", 
            ifnull(e.primer_apellido,""), " ", ifnull(e.segundo_apellido,"")) as cliente, e.id_cliente,
            concat(uc.direccion,", ",c.ciudad,", ",et.estado,", ",ps.pais) as direccion ,uc.id_ubiclient,
            s.nombre, es.id_estatus, s.id_sucursal,
            es.estatus, p.costo_total
            FROM pedido p 
            join cliente e on p.id_cliente = e.id_cliente
            join sucursal s on s.id_sucursal = p.id_sucursal
            join estatus es on es.id_estatus = p.id_estatus
            join ubicacion_pedido up on up.id_pedido = p.id_pedido
            join ubicacion_cliente uc on uc.id_ubiclient = up.id_ubicacion
            join ciudad c on c.id_ciudad = uc.id_ciudad
            join estado et on et.id_estado = c.id_estado
            join pais ps on ps.id_pais = et.id_pais';
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = 'SELECT p.id_pedido, p.hora_pedido, p.comentario_general, concat(e.nombre, " ",ifnull(e.segundo_nombre,""), " ", 
            ifnull(e.primer_apellido,""), " ", ifnull(e.segundo_apellido,"")) as cliente, e.id_cliente,
            concat(uc.direccion,", ",c.ciudad,", ",et.estado,", ",ps.pais) as direccion ,uc.id_ubiclient,
            s.nombre, es.id_estatus,s.id_sucursal,
            es.estatus, p.costo_total
            FROM pedido p 
            join cliente e on p.id_cliente = e.id_cliente
            join sucursal s on s.id_sucursal = p.id_sucursal
            join estatus es on es.id_estatus = p.id_estatus
            join ubicacion_pedido up on up.id_pedido = p.id_pedido
            join ubicacion_cliente uc on uc.id_ubiclient = up.id_ubicacion
            join ciudad c on c.id_ciudad = uc.id_ciudad
            join estado et on et.id_estado = c.id_estado
            join pais ps on ps.id_pais = et.id_pais
            where p.id_pedido=:id';
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }

    public function getbyuser($id = null)
    {
        $this->db();
            $sql = 'SELECT p.id_pedido, p.hora_pedido, p.comentario_general, concat(e.nombre, " ",ifnull(e.segundo_nombre,""), " ", 
            ifnull(e.primer_apellido,""), " ", ifnull(e.segundo_apellido,"")) as cliente, e.id_cliente,
            concat(uc.direccion,", ",c.ciudad,", ",et.estado,", ",ps.pais) as direccion ,uc.id_ubiclient,
            s.nombre, es.id_estatus,s.id_sucursal,
            es.estatus, p.costo_total
            FROM pedido p 
            join cliente e on p.id_cliente = e.id_cliente
            join usuario u on e.id_usuario = u.id_usuario
            join sucursal s on s.id_sucursal = p.id_sucursal
            join estatus es on es.id_estatus = p.id_estatus
            join ubicacion_pedido up on up.id_pedido = p.id_pedido
            join ubicacion_cliente uc on uc.id_ubiclient = up.id_ubicacion
            join ciudad c on c.id_ciudad = uc.id_ciudad
            join estado et on et.id_estado = c.id_estado
            join pais ps on ps.id_pais = et.id_pais
            where u.id_usuario=:id';
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getPlatillos($id)
    {
        $this->db();
        if (is_null($id)) {
            $sql = 'SELECT pp.id_platped,pl.nombre, pp.cantidad,p.id_pedido, pp.comentario
            FROM pedido p 
            join platillo_pedido pp on p.id_pedido = pp.id_pedido
            join platillo pl on pl.id_platillo = pp.id_platillo';
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = 'SELECT pp.id_platped,pl.nombre, pp.cantidad,p.id_pedido, pp.comentario
            FROM pedido p 
            join platillo_pedido pp on p.id_pedido = pp.id_pedido
            join platillo pl on pl.id_platillo = pp.id_platillo
            WHERE p.id_pedido=:id';
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }




    public function edit($id_pedido, $id_estatus)
    {
        $this->db();
        $sql = "UPDATE pedido SET id_estatus = :id_estatus where id_pedido= :id_pedido";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_pedido", $id_pedido, PDO::PARAM_INT);
        $st->bindParam(":id_estatus", $id_estatus, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    

    public function delete($id)
    {
        $this->db();
        try {
            $this->db->beginTransaction();
            

            $sql2 = "DELETE FROM platillo_pedido WHERE id_pedido=:id";
            $st2 = $this->db->prepare($sql2);
            $st2->bindParam(":id", $id, PDO::PARAM_INT);


            $sql4 = "DELETE FROM ubicacion_pedido WHERE id_pedido=:id";
            $st4 = $this->db->prepare($sql4);
            $st4->bindParam(":id", $id, PDO::PARAM_INT);

            $sql = "DELETE FROM pedido WHERE id_pedido=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);

            $st2->execute();
            $st4->execute();
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

    public function deletePlP($id)
    {
        $this->db();
        $sql = "DELETE FROM platillo_pedido WHERE id_pedido=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }


    public function deleteUP($id)
    {
        $this->db();
        $sql = "DELETE FROM ubicacion_pedido WHERE id_pedido=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function transfer($data,$dataP){
        
        $fou = "";
        $fou2 = "";
        foreach ($dataP as $key => $platillo):
                $fou = $fou.$platillo['cantidad'].' '.$platillo['nombre'].' ';
        endforeach;
        $fecha_actual = date('Y-m-d');
        $hora_actual = date('H:i:s');
        $this->db();
        $sql = "INSERT INTO bitacora_pedido (fecha_pedido, hora_pedido, hora_entrega, pedido, costo_total,
        comentario_general, id_cliente, id_sucursal, direccion) 
        VALUES (:fecha_pedido, :hora_pedido, :hora_entrega, :pedido, :costo_total,
        :comentario_general, :id_cliente, :id_sucursal, :direccion)";


        $st = $this->db->prepare($sql);

        $st->bindParam(":fecha_pedido", $fecha_actual, PDO::PARAM_STR);
        $st->bindParam(":hora_pedido", $data[0]['hora_pedido'], PDO::PARAM_STR);
        $st->bindParam(":hora_entrega", $hora_actual, PDO::PARAM_STR);
        $st->bindParam(":pedido", $fou, PDO::PARAM_STR);
        $st->bindParam(":costo_total", $data[0]['costo_total'], PDO::PARAM_STR);
        $st->bindParam(":comentario_general", $data[0]['comentario_general'], PDO::PARAM_STR);
        $st->bindParam(":id_cliente", $data[0]['id_cliente'], PDO::PARAM_INT);
        $st->bindParam(":id_sucursal", $data[0]['id_sucursal'], PDO::PARAM_INT);
        $st->bindParam(":direccion", $data[0]['direccion'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    

}

$pedido = new Pedido;
?>