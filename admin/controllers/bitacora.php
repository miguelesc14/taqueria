<?php
require_once("sistema.php");
class Bitacora extends Sistema
{

    public function flash($color, $msg)
    {
        include('views/flash.php');
    }
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = 'SELECT bp.*,
            concat(c.nombre, " ",ifnull(c.segundo_nombre,""), " ", 
                        ifnull(c.primer_apellido,""), " ", ifnull(c.segundo_apellido,"")) as cliente,
            s.nombre as sucursal
            FROM bitacora_pedido bp
            join cliente c on bp.id_cliente = c.id_cliente
            join sucursal s on bp.id_sucursal = s.id_sucursal';
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = 'SELECT bp.*,
            concat(c.nombre, " ",ifnull(c.segundo_nombre,""), " ", 
                        ifnull(c.primer_apellido,""), " ", ifnull(c.segundo_apellido,"")) as cliente,
            s.nombre as sucursal
            FROM bitacora_pedido bp
            join cliente c on bp.id_cliente = c.id_cliente
            join sucursal s on bp.id_sucursal = s.id_sucursal;
            where id_bpedido=:id';
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }
    

    public function getbyuser($id)
    {
        $this->db();
            $sql = 'SELECT bp.*,
            concat(c.nombre, " ",ifnull(c.segundo_nombre,""), " ", 
                        ifnull(c.primer_apellido,""), " ", ifnull(c.segundo_apellido,"")) as cliente,
            s.nombre as sucursal, u.id_usuario
            FROM bitacora_pedido bp
            join cliente c on bp.id_cliente = c.id_cliente
            join usuario u on u.id_usuario = c.id_usuario
            join sucursal s on bp.id_sucursal = s.id_sucursal
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
        $sql = "INSERT INTO bitacora_pedido (fecha_pedido, hora_pedido, hora_entrega, pedido, costo_total, comentario_general, id_cliente, id_sucursal, direccion) 
        VALUES (:fecha_pedido, :hora_pedido, :hora_entrega, :pedido, :costo_total, :comentario_general, :id_cliente, :id_sucursal, :direccion)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":fecha_pedido", $data['fecha_pedido'], PDO::PARAM_STR);
        $st->bindParam(":hora_pedido", $data['hora_pedido'], PDO::PARAM_STR);
        $st->bindParam(":hora_entrega", $data['hora_entrega'], PDO::PARAM_STR);
        $st->bindParam(":pedido", $data['pedido'], PDO::PARAM_STR);
        $st->bindParam(":costo_total", $data['costo_total'], PDO::PARAM_STR);
        $st->bindParam(":comentario_general", $data['comentario_general'], PDO::PARAM_STR);
        $st->bindParam(":id_cliente", $data['id_cliente'], PDO::PARAM_INT);
        $st->bindParam(":id_sucursal", $data['id_sucursal'], PDO::PARAM_INT);
        $st->bindParam(":direccion", $data['direccion'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function edit ($id,$data)
    {
        $this->db();
        $sql = "UPDATE bitacora_pedido SET fecha_pedido =:fecha_pedido, 
        hora_pedido =:hora_pedido, hora_entrega =:hora_entrega, pedido =:pedido,
         costo_total =:costo_total, comentario_general =:comentario_general, 
         id_cliente =:id_cliente, id_sucursal =:id_sucursal, direccion =:id_sucursal) 
        ";
        $st = $this->db->prepare($sql);
        $st->bindParam(":fecha_pedido", $data['fecha_pedido'], PDO::PARAM_STR);
        $st->bindParam(":hora_pedido", $data['hora_pedido'], PDO::PARAM_STR);
        $st->bindParam(":hora_entrega", $data['hora_entrega'], PDO::PARAM_STR);
        $st->bindParam(":pedido", $data['pedido'], PDO::PARAM_STR);
        $st->bindParam(":costo_total", $data['costo_total'], PDO::PARAM_STR);
        $st->bindParam(":comentario_general", $data['comentario_general'], PDO::PARAM_STR);
        $st->bindParam(":id_cliente", $data['id_cliente'], PDO::PARAM_INT);
        $st->bindParam(":id_sucursal", $data['id_sucursal'], PDO::PARAM_INT);
        $st->bindParam(":direccion", $data['direccion'], PDO::PARAM_STR);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM bitacora_pedido WHERE id_bpedido=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function chartPedido()
    {
        $this->db();
        $sql = "select day(bp.fecha_pedido) as dia,count(bp.id_bpedido) as cantidad 
        FROM bitacora_pedido bp
            order by 1 asc ";
        $st = $this->db->prepare($sql);
        $st->execute();
        $data = $st->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

}

$bitacora = new Bitacora;
?>