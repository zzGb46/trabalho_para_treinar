<?php

class ServicoController extends Controller
{

  private $servicoModel;

  public function __construct()
  {

    if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $this->servicoModel = new Servico();
  }
  
    
  

  // FRONT-END: Carregar a lista de serviços
  public function index()
  {


    $dados = array();
    $dados['titulo'] = 'ki ';

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

//FRONT-END: Carregar o detalhe do serviços
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



//########################################################
//BACK-END = DASHBOARD
//########################################################

//1- Método para listar todos os serviços
public function listar(){

  if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'funcionario'){

  header('Location:' . BASE_URL);
  exit;
}

$dados = array();

$dados['listaServico'] = $this->servicoModel->getTodosServicos();
$dados['conteudo'] = 'dash/servico/listar';

$this->carregarViews('dash/dashboard', $dados);

}

//2- Método para adicionar serviços 
public function adicionar(){

  $dados = array();
  $dados['conteudo'] = 'dash/servico/adicionar';
  
  $this->carregarViews('dash/dashboard', $dados);
  
  }


//3-Método para editar 
public function editar(){

  $dados = array();
  $dados['conteudo'] = 'dash/servico/editar';
  
  $this->carregarViews('dash/dashboard', $dados);
  
  }


//4-Método para desativar o serviço
public function desativar(){

  $dados = array();
  $dados['conteudo'] = 'dash/servico/desativar';
  
  $this->carregarViews('dash/dashboard', $dados);
  
  }
}
