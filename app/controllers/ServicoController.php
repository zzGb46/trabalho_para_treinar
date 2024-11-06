<?php

class ServicoController extends Controller{

    public function index(){


    $dados = array();
    $dados['titulo'] = 'ki oficina';

   

    $this->carregarViews('servico',$dados);

    }
}