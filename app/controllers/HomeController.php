<?php

class HomeController extends Controller{

    public function index(){


    $dados = array();
    $dados['titulo'] = 'ki oficina';

   //instanciar o metodo servico 
   $servicoModel = new Servico();

   //obter os 3 servicos
   $servicoAleatorio = $servicoModel->getServicoAleatorio(3);

//    var_dump($servicoAleatorio);

  $dados['servicos'] = $servicoAleatorio;

  // var_dump($dados);

    $this->carregarViews('home',$dados);

    }
}