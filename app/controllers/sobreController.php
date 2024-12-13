<?php

class SobreController extends Controller{

    public function index(){


    $dados = array();
    $dados['titulo'] = 'Sobre nós - ki oficina';

    $depoimentoModel = new Depoimento();

    $depoimentoAleatorio = $depoimentoModel->getDepoimentoAleatorio(3);
    $dados['depoimentos'] = $depoimentoAleatorio;

    $this->carregarViews('sobre',$dados);

    }
}