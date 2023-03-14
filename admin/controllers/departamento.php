<?php
require_once("Sistema.php");
class Departamento extends Sistema
{
    public function get($id=null)
    {
        $this->db();
        if(is_null($id)){
            $sql="SELECT * from departamento";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        }
        else{
            $sql="SELECT * from departamento where id_departamento = :id";
            $st = $this->db->prepare($sql);
            $st= $this->bindParam(":id",$id);
            $st->execute();
            $data = $st->fetchAll();
            $data=$data[0];
        }
       
        return $data;
    } 
    
    public function new($data){

    }
    public function edit($id,$data){
        
    }
    public function delete($data){
        
    }

}
$web = new Departamento;
?>