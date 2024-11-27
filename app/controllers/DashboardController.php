<?php

class DashboardController extends Controller
{

    public function index()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if(isset($_SESSION['userId']) || isset($_SESSION['userTipo'])){
            
            header('location:' . BASE_URL);
            exit;
        }

        $dados = array();
        $dados['titulo'] = 'Dashboard - Ki ficina';
        $dados['nomeUser'] = $_SESSION['userNome'];
        $dados['idUser'] = $_SESSION['userId'];
        $dados['tipoUser'] = $_SESSION['userTipo'];

        $this->carregarViews('dash/dashboard', $dados);

    }
}
