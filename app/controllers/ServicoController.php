<?php

class ServicoController extends Controller
{

  public function index()
  {


    $dados = array();
    $dados['titulo'] = 'ki oficina';

    $servicoModel = new Servico();

    //obter os 3 servicos
    $servicoAleatorio = $servicoModel->getServicoAleatorio(3);

//obter dados do banco de dados para a pagina serviços que não estão vinculados a pagina home
    $todosServicos = $servicoModel->getServicos();

    //    var_dump($servicoAleatorio);

    $dados['servicos'] = $servicoAleatorio;
    $dados['todosServicos'] = $todosServicos;

    $this->carregarViews('servico', $dados);
  }


  public function detalhe($link)
  {

    $dados = array();

    $servicoModel = new Servico();
    $detalheServico = $servicoModel->getServicoPorLink($link);

    if ($detalheServico) {

      $dados['titulo'] = $detalheServico['nome_servico'];
      $dados['detalhe'] = $detalheServico;
      $this->carregarViews('detalhe-servicos', $dados);
    } else {
      $dados['titulo'] = 'servicos ki oficina';
      $this->carregarViews('servicoTwo', $dados);
    }
  }
}
