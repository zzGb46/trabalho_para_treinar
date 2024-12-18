<?php

class AuthController extends Controller
{

    public function login()
    {

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $senha = filter_input(INPUT_POST, 'senha');
            $tipo_usuario = filter_input(INPUT_POST, 'tipo_usuario');

            // var_dump('email');
            // var_dump('senha');
            // var_dump('tipo_usuario');

            if ($email && $senha && $tipo_usuario != 'selecione') {

                if ($tipo_usuario === 'cliente') {
                    $usuarioModel = new Cliente();
                    $usuario = $usuarioModel->buscarCliente($email);
                    $campoSenha = 'senha_cliente';
                    $campoId = 'id_cliente';
                    $campoNome = 'nome_cliente';
                } elseif ($tipo_usuario === 'funcionario') {
                    $usuarioModel = new Funcionario();
                    $usuario = $usuarioModel->buscarFuncionario($email);
                    $campoSenha = 'senha_funcionario';
                    $campoId = 'id_funcionario';
                    $campoNome = 'nome_funcionario';
                } else {
                    $usuario = null;
                }

                if ($usuario && $usuario[$campoSenha] == $senha) {


                    // 
                    $_SESSION['userId'] = $usuario[$campoId];
                    $_SESSION['userTipo'] = $tipo_usuario;
                    $_SESSION['userNome'] = $usuario[$campoNome];

                    //Redirecionar para a página de Dashboard
                    header('Location: ' . BASE_URL . 'dashboard');
                    exit;

                } else {

                    var_dump('Login incorreto');
                    $_SESSION['login-erro'] = 'E-mail ou Senha incorreta';

                }
            } else {
                //Credenciais invalidaas

                var_dump('Login incorreto 2');
                $_SESSION['login-erro'] = 'Preencha todos os dados';
            }

            header('location:' . BASE_URL);
            exit;


        }

        header('location:' . BASE_URL);
        exit;
    }

    public function sair()
    {
        session_unset();
        session_destroy();
        header('location:' . BASE_URL);
        exit;
    }
}
