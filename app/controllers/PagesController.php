<?php

class PagesController extends Controller{

    public function index(){


    $dados = array();
    $dados['titulo'] = ' Contato - ki oficina';

   

    $this->carregarViews('page',$dados);

    }
}