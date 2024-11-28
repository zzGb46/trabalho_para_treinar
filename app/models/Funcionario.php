<?php

class Funcionario extends Model
{


    //Método para pegar somente 3 servicos de forma aleatoria

    public function buscarFunc($email)
    {


        $sql = "SELECT * FROM tbl_gabrielm_cliente WHERE email_funcionario = :email AND status_cliente = 'Ativo';";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
