<?php

class BlogController extends Controller{

    public function index(){


    $dados = array();
    $dados['titulo'] = ' Contato - ki oficina';

   

    $this->carregarViews('blog',$dados);

    }
}