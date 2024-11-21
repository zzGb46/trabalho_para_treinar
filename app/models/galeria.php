<?php

class Galeria extends Model
{

    //Metodo para Pegar somente 3 serviços de forma aleatória
    public function getGaleriaAleatorio($limite=5)
    {

        $sql = "select * from tbl_gabrielm_galeria where status_galeria= 'ativo' order by rand() limit :limite;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }

    //metodo listar todos os serviços ativos por ordem alfabetica
}