<?php

class HomeController extends Controller{

    public function index(){


    $dados = array();
    $dados['titulo'] = 'ki oficina';

   

    $this->carregarViews('home',$dados);

    }
}