<?php
require_once('controllers/sistema.php');

class Publicacion extends Sistema{

    public function flash($color, $msg)
    {
        include('views/flash.php');
    }
    public function get($id=null){
        $this->db();
        if(is_null($id)){
            $sql = "Select * from publicacion";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data= $st->fetchAll();
        }else{
            $sql = "Select * from publicacion where id_publicacion = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data= $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function new($data){
        $this->db();
        $fecha_actual = date("Y-m-d H:i:s");
        $sql = "insert into publicacion (titulo, contenido, fecha_publicacion) values 
        (:titulo, :contenido, :fecha_publicacion)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":titulo",$data['titulo'],PDO::PARAM_STR);
        $st->bindParam(":contenido",$data['contenido'],PDO::PARAM_STR);
        $st->bindParam(":fecha_publicacion",$fecha_actual,PDO::PARAM_STR);
        $st->execute();
        $rc=$st->rowCount();
        return $rc;
    }

    public function edit($data,$id){
        $this->db();
        $fecha_actual = date("Y-m-d H:i:s");
        $sql = "update publicacion set titulo =:titulo, contenido =:contenido, fecha_publicacion=:fecha_publicacion
        where id_publicacion=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":titulo",$data['titulo'],PDO::PARAM_STR);
        $st->bindParam(":contenido",$data['contenido'],PDO::PARAM_STR);
        $st->bindParam(":fecha_publicacion",$fecha_actual,PDO::PARAM_STR);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function delete($id){
        $this->db();
        $sql = "delete from publicacion
        where id_publicacion=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }


}

$publicacion = new Publicacion;
?>