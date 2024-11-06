<?php

class ErroController extends Controller{

    public function index(){


    $dados = array();
    $dados['titulo'] = 'Erro - Ki Oficina';

   
    $this->carregarViews('erro',$dados);

    }
}