<?php

class ServicoTwoController extends Controller{

    public function index(){


    $dados = array();
    $dados['titulo'] = ' Contato - ki oficina';

   

    $this->carregarViews('servicoTwo',$dados);

    }
}