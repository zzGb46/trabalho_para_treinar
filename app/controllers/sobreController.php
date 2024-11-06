<?php

class SobreController extends Controller{

    public function index(){


    $dados = array();
    $dados['titulo'] = 'Sobre nós - ki oficina';

    $this->carregarViews('sobre',$dados);

    }
}