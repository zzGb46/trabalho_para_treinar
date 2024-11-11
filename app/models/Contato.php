<?php

class Contato extends Model
{
    //salvar o email na base de dados

    public function salvarEmail($nome_contato, $email_contato, $telefone_contato, $assunto_contato, $mensagem_contato)
    {

        $sql = "INSERT INTO tb_contato(
    nome_contato, 
    email_contato, 
    telefone_contato, 
    assunto_contato, 
    mensagem_contato)
    value(
    :nome_contato,
    :email_contato,
    :telefone_contato,
    :assunto_contato,
    :mensagem_contato)";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':nome_contato', $nome_contato);
    $stmt->bindValue(':email_contato', $email_contato);
    $stmt->bindValue(':telefone_contato', $telefone_contato);
    $stmt->bindValue(':assunto_contato', $assunto_contato);
    $stmt->bindValue(':mensagem_contato', $mensagem_contato);

    return $stmt->execute();
    }
}
