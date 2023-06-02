<?php
require_once(__DIR__."/sistema.php");
class Usuario extends Sistema
{
    public function getUsuario($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from usuario";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select * from usuario where id_usuario=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }


    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from usuario_puesto";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select * from usuario_puesto where id_usupues=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }

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

    public function new ($data)
    {
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

    public function validarContrasena($id, $cont){
        
        $kont = $this->getUsuario($id);
        

        if($kont[0]['contrasena']==$cont){
            
            return true;
        }else{
            return false;
        }

    }

    public function edit($id, $data)
    {
        $cont=md5($data['contrasena']);
        
        $new_cont=md5($data['new_contrasena']);
        if($this->validarContrasena($id, $cont)){
            
            $this->db();
            $sql = "UPDATE usuario SET correo = :correo, contrasena =:contrasena 
            where id_usuario= :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->bindParam(":correo", $data['correo'], PDO::PARAM_STR);
            if(is_null($data['new_contrasena'])==true){
                $st->bindParam(":contrasena", $cont, PDO::PARAM_STR);
            }else{
                $st->bindParam(":contrasena", $new_cont, PDO::PARAM_STR);
            }
            $st->execute();

            $rc = $st->rowCount();
            return $rc;
        }else{
            return 0;
        }
    }
    public function delete($id)
    {
        $this->db();
        try {
            $this->db->beginTransaction();

            $sql2 = "DELETE FROM usuario_puesto WHERE id_usuario=:id_usuario";
            $st2 = $this->db->prepare($sql2);
            $st2->bindParam(":id_usuario", $id, PDO::PARAM_INT);


            $sql = "DELETE FROM usuario WHERE id_usuario=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            
            
            
            
            $st2->execute();
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

    public function getPuesto($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from usuario u
            left join usuario_puesto ur on u.id_usuario = ur.id_usuario
            right join puesto r on ur.id_puesto = r.id_puesto";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from usuario u
            left join usuario_puesto ur on u.id_usuario = ur.id_usuario
            right join puesto r on ur.id_puesto = r.id_puesto
            where u.id_usuario=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function getUsuarioPuesto($id_usu=null, $id_puesto=null)
    {
        $this->db();
        if (is_null($id_puesto) || is_null($id_usu)) {
            $sql = "select * from usuario_puesto";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from usuario_puesto
            WHERE id_puesto=:id_puesto and id_usuario=:id_usuario";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id_puesto", $id_puesto, PDO::PARAM_INT);
        $st->bindParam(":id_usuario", $id_usu, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function validarUsuarioPuesto($id_usu, $id_puesto){
        $val = $this->getUsuarioPuesto($id_usu, $id_puesto);
        return $val;
    }

    public function deletePuesto($id_usu,$id_puesto)
    {
        
        $this->db();
        
        $sql = "DELETE FROM usuario_puesto WHERE id_puesto=:id_puesto and id_usuario=:id_usuario";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_puesto", $id_puesto, PDO::PARAM_INT);
        $st->bindParam(":id_usuario", $id_usu, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function newPuesto($id, $data)
    {
        $this->db();
        $sql = "INSERT INTO usuario_puesto (id_usuario, id_puesto) VALUES (:id_usuario, :id_puesto)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_puesto", $data['id_puesto'], PDO::PARAM_INT);
        $st->bindParam(":id_usuario", $data['id_usuario'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function newPuestoDef($id)
    {
        $this->db();
        $sql = "INSERT INTO usuario_puesto (id_usuario, id_puesto) VALUES (:id_usuario, :id_puesto)";
        $st = $this->db->prepare($sql);
        $d = 1;

        $st->bindParam(":id_puesto", $d, PDO::PARAM_INT);
        $st->bindParam(":id_usuario", $id[0]['id_usuario'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }

    public function editPuesto($id, $data)
    {
        $this->db();
        $sql = "UPDATE usuario_puesto SET id_puesto = :id_puesto, id_usuario =:id_usuario 
        where id_usupues= :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_usuario", $data['id_usuario'], PDO::PARAM_INT);
        $st->bindParam(":id_puesto", $data['id_puesto'], PDO::PARAM_INT);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    
    
}
$usuario = new Usuario;
?>