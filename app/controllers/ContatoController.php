<?php

class ContatoController extends Controller{

    public function index(){


    $dados = array();
    $dados['titulo'] = ' Contato - ki oficina';

   

    $this->carregarViews('contato',$dados);

    }
}