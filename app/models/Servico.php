<?php

class Servico extends Model
{

    //Metodo para Pegar somente 3 serviços de forma aleatória
    public function getServicoAleatorio($limite=3)
    {

        $sql = "select s.id_servico, s.nome_servico, s.descricao_servico, g.foto_galeria, g.alt_foto_galeria from tbl_gabrielm_servico as s
        inner join tbl_gabrielm_galeria as g 
        on g.id_servico = s.id_servico
         where status_servico = 'Ativo' order by rand() limit :limite";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }
    public function ServicoAleatorio()
    {

        $sql = "select s.id_servico, s.nome_servico, g.foto_galeria, g.alt_foto_galeria from tbl_gabrielm_servico as s
        inner join tbl_gabrielm_galeria as g 
        on g.id_servico = s.id_servico
         where status_servico = 'Ativo' order by rand() limit 3;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }
    //metodo listar todos os serviços ativos por ordem alfabetica

    //metodo para carregar o servico pelo link
    public function getServicoPorLink($link){
        $sql = "SELECT tbl_gabrielm_servico.*, tbl_gabrielm_galeria FROM tbl_gabrielm_servico inner join tbl_gabrielm_galeria on tbl_gabrielm_servico. id_servico tbl_gabrielm_servico where status_servico = 'ativo' AND link_servico = :link ";
    }

}
