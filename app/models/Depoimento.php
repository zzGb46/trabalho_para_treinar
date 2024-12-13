<?php

class Depoimento extends Model
{

    //Metodo para Pegar somente 3 serviços de forma aleatória
    public function getDepoimentoAleatorio($limite=3)
    {

        $sql = "select c.nome_cliente, cidade_cliente, d.descricao_depoimento, c.foto_cliente, c.alt_foto_cliente from tbl_depoimento as d
        inner join tbl_gabrielm_cliente as c
        on d.id_cliente = c.id_cliente order by rand() limit :limite";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
       


    }

    //metodo listar todos os serviços ativos por ordem alfabetica
}