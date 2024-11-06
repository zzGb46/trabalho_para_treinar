<?php

class Core
{

    //Método inicializar processo de ROTAS

    public function executar()
    {

        $url = '/';

        //var_dump($url);

        // Verificar se variavel URL esta definida na $_GET

        if (isset($_GET['url'])) {

            $url .= $_GET['url'];
        }
        //($url);


        $parametro = array();

        //Definindo um Array para armazenas parametros da URL

        //Verifica se a url não esta vazia  E não é apenas uma barra /

        if (!empty($url) && $url != '/') {


            // antes era servicos/especialidade/nomeServico

            // controler/ação/parametro

            $url = explode('/', $url);
            //var_dump($url);
            //servicos[0]
            //especialidade[1]
            //nomeServico[2]



            array_shift($url);

            //Obter o controller atual
            //ucfirst - colocar a primeira letra em maiuscula
            //concatenar . Controller para seguir um padrao 

            $controladorAtual = ucfirst($url[0]) . 'Controller';

            // controladorAtual = ServicosController

            //var_dump($url);

            array_shift($url);

            //especialidade=[0]
            //NomeServico=[1]
            //var_dump($url);

            //Verificar se existe uma ação na URL
            if (isset($url[0]) && !empty($url[0])) {

                $acaoAtual = $url[0];
                // var_dump("Valor". $acaoAtual);
                array_shift($url);
            } else {
                $acaoAtual = 'index';
                //var_dump($acaoAtual);
            }

            //Os parametros

            array_shift($url);

            //var_dump($url);

            if (count($url) > 0) {
                $parametro = $url;
            }




            // var_dump($controladorAtual);
        } else {
            $controladorAtual = 'HomeController';
            $acaoAtual = 'index';
            //var_dump($controladorAtual);
        }



        // // Verificando se o file do CONTROLLER existe e se o METODO existe
        if (!file_exists('../app/controllers/' . $controladorAtual . '.php') || !method_exists($controladorAtual, $acaoAtual)) {

            //     // Se não existir defina o controller como erro 

            $controladorAtual = 'ErroController';
            $acaoAtual = 'index';
        
        }

        // var_dump($controladorAtual);
        // // Instancia o controle atual

        $controller = new $controladorAtual();

       

        call_user_func_array(array($controller, $acaoAtual), $parametro);
    }
}
