<?php
require_once("sistema.php");
class Registro extends Sistema
{

    public function getId($correo)
    {
        $this->db();

            $sql = "select id_usuario from usuario where correo=:correo";
            $st = $this->db->prepare($sql);
            $st->bindParam(":correo", $correo, PDO::PARAM_STR);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function newUser($data){
        $cont=md5($data['contrasena']);
        $this->db();
        try {
            $this->db->beginTransaction();
        $sql = "INSERT INTO usuario (correo, contrasena) VALUES (:correo, :contrasena)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":correo", $data['correo'], PDO::PARAM_STR);
        $st->bindParam(":contrasena",$cont , PDO::PARAM_STR);
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
    
    public function newClient ($ide,$data)
    {
        $this->db();
        try {
            $this->db->beginTransaction();



            $hora_actual = date("h:i:s A");
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
        $st->bindParam(":fecha_registro", $data['fecha_registro'], PDO::PARAM_STR);;
        if ($sesubio) {
            $st->bindParam(":imagen_perfil", $sesubio, PDO::PARAM_STR);
            }
        $st->bindParam(":id_usuario", $ide[0]['id_usuario'], PDO::PARAM_INT);


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


    public function newPuestoDef($id)
    {
        $this->db();
        try {
            $this->db->beginTransaction();
        $sql = "INSERT INTO usuario_puesto (id_usuario, id_puesto) VALUES (:id_usuario, :id_puesto)";
        $st = $this->db->prepare($sql);
        $d = 1;

        $st->bindParam(":id_puesto", $d, PDO::PARAM_INT);
        $st->bindParam(":id_usuario", $id[0]['id_usuario'], PDO::PARAM_INT);

        $sql2 = "INSERT INTO usuario_puesto (id_usuario, id_puesto) VALUES (:id_usuario, :id_puesto)";
        $st2 = $this->db->prepare($sql2);
        $d2 = 6;

        $st2->bindParam(":id_puesto", $d2, PDO::PARAM_INT);
        $st2->bindParam(":id_usuario", $id[0]['id_usuario'], PDO::PARAM_INT);

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

    
}
$registro = new Registro;
?>