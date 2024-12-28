<?php
require_once("sistema.php");
class Kart extends Sistema
{

    public function flash($color, $msg)
    {
        include('views/flash.php');
    }
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = 'SELECT p.id_temp, p.hora_pedido, p.comentario_general, concat(e.nombre, " ",ifnull(e.segundo_nombre,""), " ", 
            ifnull(e.primer_apellido,""), " ", ifnull(e.segundo_apellido,"")) as cliente, e.id_cliente,
            concat(uc.direccion,", ",c.ciudad,", ",et.estado,", ",ps.pais) as direccion ,uc.id_ubiclient,
            s.nombre as sucur, s.id_sucursal
            FROM temp_pedido p 
            join cliente e on p.id_cliente = e.id_cliente
            join sucursal s on s.id_sucursal = p.id_sucursal
            join temp_uc up on up.id_temp = p.id_temp
            join ubicacion_cliente uc on uc.id_ubiclient = up.id_ubicacion
            join ciudad c on c.id_ciudad = uc.id_ciudad
            join estado et on et.id_estado = c.id_estado
            join pais ps on ps.id_pais = et.id_pais';
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = 'SELECT p.id_temp, p.hora_pedido, p.comentario_general, concat(e.nombre, " ",ifnull(e.segundo_nombre,""), " ", 
            ifnull(e.primer_apellido,""), " ", ifnull(e.segundo_apellido,"")) as cliente, e.id_cliente,
            concat(uc.direccion,", ",c.ciudad,", ",et.estado,", ",ps.pais) as direccion ,uc.id_ubiclient,
            s.nombre as sucur, s.id_sucursal
            FROM temp_pedido p 
            join cliente e on p.id_cliente = e.id_cliente
            join sucursal s on s.id_sucursal = p.id_sucursal
            join temp_uc up on up.id_temp = p.id_temp
            join ubicacion_cliente uc on uc.id_ubiclient = up.id_ubicacion
            join ciudad c on c.id_ciudad = uc.id_ciudad
            join estado et on et.id_estado = c.id_estado
            join pais ps on ps.id_pais = et.id_pais
            where p.id_temp=:id';
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }

    public function getUC($id_usuario = null)
    {
        $this->db();

        $sql = 'SELECT uc.id_ubiclient, concat(uc.direccion,", ",c.ciudad,", ",et.estado,", ",ps.pais) as direccion
        from ubicacion_cliente uc
        inner join ciudad c on uc.id_ciudad = c.id_ciudad
        inner join estado et on et.id_estado = c.id_estado
        inner join pais ps on ps.id_pais = et.id_pais
        inner join cliente cl on cl.id_cliente = uc.id_cliente
        inner join usuario u on cl.id_usuario = u.id_usuario
        where u.id_usuario=:id';
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id_usuario, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getIdc($id_usuario = null)
    {
        $this->db();

        $sql = 'SELECT c.id_cliente
        from cliente c
        inner join usuario u on c.id_usuario = u.id_usuario
        where u.id_usuario=:id';
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id_usuario, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getId($id_usuario = null)
    {
        $this->db();

        $sql = 'SELECT p.id_temp
        from temp_pedido p
        where p.hora_pedido=:id';
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id_usuario, PDO::PARAM_STR);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getIdP($id_usuario = null)
    {
        $this->db();

        $sql = 'SELECT p.id_pedido
        from pedido p
        where p.hora_pedido=:id';
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id_usuario[0]['hora_pedido'], PDO::PARAM_STR);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getbyuser($id = null)
    {
        $this->db();

        $sql = 'SELECT p.id_pedido, p.hora_pedido, p.comentario_general, concat(e.nombre, " ",ifnull(e.segundo_nombre,""), " ", 
        ifnull(e.primer_apellido,""), " ", ifnull(e.segundo_apellido,"")) as cliente, e.id_cliente,
        concat(uc.direccion,", ",c.ciudad,", ",et.estado,", ",ps.pais) as direccion ,uc.id_ubiclient,
        s.nombre, s.id_sucursal,
        es.estatus
        FROM temp_pedido p 
        join cliente e on p.id_cliente = e.id_cliente
        join usuario u on e.id_usuario = u.id_usuario
        join sucursal s on s.id_sucursal = p.id_sucursal
        join temp_uc up on up.id_temp = p.id_temp
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

    public function new ($data,$hora_actual){
        $this->db();

        $sql = "INSERT INTO temp_pedido (hora_pedido, comentario_general, id_cliente, id_sucursal) 
        VALUES (:hora_pedido, :comentario_general, :id_cliente, :id_sucursal)";
        $st = $this->db->prepare($sql);

        $st->bindParam(":hora_pedido", $hora_actual, PDO::PARAM_STR);
        $st->bindParam(":comentario_general", $data['comentario_general'], PDO::PARAM_STR);
        $st->bindParam(":id_cliente", $data['id_cliente'], PDO::PARAM_INT);
        $st->bindParam(":id_sucursal", $data['id_sucursal'], PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function newUC ($id, $data){
        $this->db();
        $sql = "INSERT INTO temp_uc (id_ubicacion, id_temp) 
        VALUES (:id_ubicacion, :id_temp)";
        $st = $this->db->prepare($sql);

        $st->bindParam(":id_ubicacion", $data['id_ubicacion'], PDO::PARAM_INT);
        $st->bindParam(":id_temp", $id[0]['id_temp'], PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function edit ($id,$data){
        $this->db();
        
        try {
            $this->db->beginTransaction();
        $sql = "UPDATE temp_pedido set hora_pedido =:hora_pedido, 
        comentario_general =:comentario_general, 
        id_cliente =:id_cliente, 
        id_sucursal =:id_sucursal
        where id_temp=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":hora_pedido", $data['hora_pedido'], PDO::PARAM_STR);
        $st->bindParam(":comentario_general", $data['comentario_general'], PDO::PARAM_STR);
        $st->bindParam(":id_cliente", $data['id_cliente'], PDO::PARAM_INT);
        $st->bindParam(":id_sucursal", $data['id_sucursal'], PDO::PARAM_INT);
        $st->bindParam(":id", $id, PDO::PARAM_INT);

        $sql2 = "UPDATE temp_uc set id_ubicacion =:id_ubicacion
        where id_temp = :id";
        $st2 = $this->db->prepare($sql2);
        $st2->bindParam(":id_ubicacion", $data['id_ubicacion'], PDO::PARAM_INT);
        $st2->bindParam(":id", $id, PDO::PARAM_INT);

        $st->execute();
        $st2->execute();
        $rc = $st->rowCount();
        $this->db->commit();
        } catch (PDOException $Exception) {
            $rc = 0;
            print "DBA FAIL:" . $Exception->getMessage();
            $this->db->rollBack();
        }
        return $rc;
    }

    public function newPlatillo ($id, $data){
        $this->db();
        $sql = "INSERT INTO temp_platillo (id_temp, id_platillo, cantidad, comentario) 
        VALUES (:id_temp, :id_platillo, :cantidad, :comentario)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_temp", $id, PDO::PARAM_INT);
        $st->bindParam(":id_platillo", $data['id_platillo'], PDO::PARAM_INT);
        $st->bindParam(":cantidad", $data['cantidad'], PDO::PARAM_INT);
        $st->bindParam(":comentario", $data['comentario'], PDO::PARAM_STR);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function editPlatillo ($id_temp,$id, $data){
        $this->db();
        $sql = "UPDATE temp_platillo set id_temp=:id_temp, id_platillo=:id_platillo, 
        cantidad=:cantidad, comentario=:comentario
        where id_temppl = :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_temp", $id_temp, PDO::PARAM_INT);
        $st->bindParam(":id_platillo", $data['id_platillo'], PDO::PARAM_INT);
        $st->bindParam(":cantidad", $data['cantidad'], PDO::PARAM_INT);
        $st->bindParam(":comentario", $data['comentario'], PDO::PARAM_STR);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function deletePlatillo($id)
    {
        $this->db();
        $sql = "DELETE FROM temp_platillo WHERE id_temppl=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function getPlatillos($id=null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = 'SELECT pp.id_temppl,pl.nombre,pl.precio, pp.cantidad,p.id_temp,pp.comentario,pl.id_platillo
            FROM temp_pedido p 
            join temp_platillo pp on p.id_temp = pp.id_temp
            join platillo pl on pl.id_platillo = pp.id_platillo';
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = 'SELECT pp.id_temppl,pl.nombre, pp.cantidad,p.id_temp,pp.comentario,pl.id_platillo
            FROM temp_pedido p 
            join temp_platillo pp on p.id_temp = pp.id_temp
            join platillo pl on pl.id_platillo = pp.id_platillo
            WHERE p.id_temp=:id';
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }

    public function getCosto($id=null){
        $this->db();
        if(is_null($id)){
            $sql='SELECT CAST(SUM(tp.cantidad*p.precio) AS DECIMAL(10,2)) as costo, tp.id_temp
        FROM temp_platillo tp 
        inner join platillo p on p.id_platillo = tp.id_platillo';
        $st = $this->db->prepare($sql);
        $st->execute();
        $data = $st->fetchAll();
        }else{
            $sql='SELECT CAST(SUM(tp.cantidad*p.precio) AS DECIMAL(10,2)) as costo, tp.id_temp
        FROM temp_platillo tp 
        inner join platillo p on p.id_platillo = tp.id_platillo 
        WHERE id_temp=:id';
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();
        $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function getPlatillo($id)
    {
        $this->db();
        if (is_null($id)) {
            $sql = 'SELECT pp.id_temppl,pl.nombre, pp.cantidad,p.id_temp,pp.comentario,pl.id_platillo
            FROM temp_pedido p 
            join temp_platillo pp on p.id_temp = pp.id_temp
            join platillo pl on pl.id_platillo = pp.id_platillo';
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = 'SELECT pp.id_temppl,pl.nombre, pp.cantidad,p.id_temp,pp.comentario,pl.id_platillo
            FROM temp_pedido p 
            join temp_platillo pp on p.id_temp = pp.id_temp
            join platillo pl on pl.id_platillo = pp.id_platillo
            WHERE pp.id_temppl=:id';
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }



    

    public function delete($id)
    {
        $this->db();
        try {
            $this->db->beginTransaction();
            

            $sql2 = "DELETE FROM temp_platillo WHERE id_temp=:id";
            $st2 = $this->db->prepare($sql2);
            $st2->bindParam(":id", $id, PDO::PARAM_INT);

            $sql4 = "DELETE FROM temp_uc WHERE id_temp=:id";
            $st4 = $this->db->prepare($sql4);
            $st4->bindParam(":id", $id, PDO::PARAM_INT);

            $sql = "DELETE FROM temp_pedido WHERE id_temp=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);

            
            
            
            
            $st4->execute();
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

    public function trans($data, $dataC){
        $this->db();
        try {
            $this->db->beginTransaction();

            $sql = "INSERT INTO pedido (hora_pedido, comentario_general, id_cliente, id_sucursal, id_estatus, costo_total)
             values (:hora_pedido, :comentario_general, :id_cliente, :id_sucursal, :id_estatus, :costo_total)";
            $st = $this->db->prepare($sql);
            $es = 1;
            $st->bindParam(":hora_pedido", $data[0]['hora_pedido'], PDO::PARAM_STR);
            $st->bindParam(":comentario_general", $data[0]['comentario_general'], PDO::PARAM_STR);
            $st->bindParam(":id_cliente", $data[0]['id_cliente'], PDO::PARAM_INT);
            $st->bindParam(":id_sucursal", $data[0]['id_sucursal'], PDO::PARAM_INT);
            $st->bindParam(":id_estatus", $es, PDO::PARAM_INT);
            $st->bindParam(":costo_total", $dataC[0]['costo'], PDO::PARAM_STR);

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

    public function transUC ($id, $data){
        $this->db();
        try {
            $this->db->beginTransaction();
        $sql2 = "INSERT INTO ubicacion_pedido (id_ubicacion, id_pedido) 
            VALUES (:id_ubicacion, :id_pedido)";
            $st2 = $this->db->prepare($sql2);

            $st2->bindParam(":id_ubicacion", $data[0]['id_ubiclient'], PDO::PARAM_INT);
            $st2->bindParam(":id_pedido", $id[0]['id_pedido'], PDO::PARAM_INT);

            $st2->execute();
            $rc = $st2->rowCount();
            $this->db->commit();
        } catch (PDOException $Exception) {
            $rc = 0;
            print "DBA FAIL:" . $Exception->getMessage();
            $this->db->rollBack();
        }
        return $rc;
    }

    public function transPL ($id, $dataPL){
        $this->db();
        try {
            $this->db->beginTransaction();
        $sql = "INSERT INTO platillo_pedido (id_pedido, id_platillo, cantidad, comentario) 
        VALUES (:id_pedido, :id_platillo, :cantidad, :comentario)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_pedido", $id[0]['id_pedido'], PDO::PARAM_INT);
        $st->bindParam(":id_platillo", $dataPL['id_platillo'], PDO::PARAM_INT);
        $st->bindParam(":cantidad", $dataPL['cantidad'], PDO::PARAM_INT);
        $st->bindParam(":comentario", $dataPL['comentario'], PDO::PARAM_STR);
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

$kart = new Kart;
?>