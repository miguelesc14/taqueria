<?php
require_once("sistema.php");
class Configpassword extends Sistema
{

    public function getContrasena($correo)
    {
        $data = array();
        if ($this->validateEmail($correo)) {
            $this->db();
            $sql = 'select u.contrasena from usuario u
            where correo =:correo';

            $st = $this->db->prepare($sql);
            $st->bindParam(":correo", $correo, PDO::PARAM_STR);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);

        }
        return $data;

    }

    public function editContrasena($data, $contra, $correo)
    {
        $contra = $contra[0]['contrasena'];
        $contrasena_actual = md5($data['contrasena_actual']);
        $nueva_contrasena = md5($data['nueva_contrasena']);
        $repetir_contrasena  = md5($data['repetir_contrasena']);
        $data = null;
        if ($this->validateEmail($correo)) {
            if($contra == $contrasena_actual){
                if($nueva_contrasena == $repetir_contrasena){
                    $this->db();
                    $sql = 'update usuario set contrasena =:nueva_contrasena
                    where correo =:correo';

                    $st = $this->db->prepare($sql);
                    $st->bindParam(":correo", $correo, PDO::PARAM_STR);
                    $st->bindParam(":nueva_contrasena", $nueva_contrasena, PDO::PARAM_STR);
                    $st->execute();
                    $data = $st->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        return false;
    }


}
$configpassword = new Configpassword;
?>