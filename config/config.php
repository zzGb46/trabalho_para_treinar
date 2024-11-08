<?php


//cria constantes
define("BASE_URL", "https://kioficina.smp.sistema.com.br/");


//configuração database

define("DB_HOST", "smpsistema.com.br");

define("DB_NAME", "");

define("DB_USER", "");

define("DB_PASS", "");

//Configuração do email
define('EMAIL_HOST', 'smpsistema.com.br');
define('EMAIL_PORT', '465');
define('EMAIL_USER', 'solarprog@tipi02.smpsistema.com.br');
define('EMAIL_PASS', 'Senac@solarprog01');


//sistema de autoload das class

spl_autoload_register(function ($classe) {

    if (file_exists('../app/controllers/' . $classe . '.php')) {
        require_once '../app/controllers/' . $classe . '.php';
    }

    if (file_exists('../app/models/' . $classe . '.php')) {
        require_once '../app/models' . $classe . '.php';
    }

    if (file_exists('../core/' . $classe . '.php')) {
        require_once '../core/' . $classe . '.php';
    }
});
