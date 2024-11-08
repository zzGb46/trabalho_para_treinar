<?php

class ContatoController extends Controller
{

    public function index()
    {


        $dados = array();
        $dados['titulo'] = ' Contato - ki oficina';



        $this->carregarViews('contato', $dados);
    }

    //EnviarEmail
    public function enviarEmail()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);
            $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_SPECIAL_CHARS);
            $msg = filter_input(INPUT_POST, 'msg', FILTER_SANITIZE_SPECIAL_CHARS);

            //  var_dump($nome);
            //  var_dump($email);
            //  var_dump($tel);
            //  var_dump($assunto);
            //  var_dump($msg);
            //  var_dump($_SERVER);
            //  var_dump($nome);

            if ($nome && $email && $tel && $msg) {

                //reconheçer estrutura PHPMAILER


                require_once("vendors/phpmailer/PHPMailer.php");
                require_once("vendors/phpmailer/SMTP.php");
                require_once("vendors/phpmailer/Exception.php");


                $phpmail = new PHPMailer\PHPMailer\PHPMailer(); //Gerando variavel de email

                try {
                    $phpmail->isSMTP(); //envio por SMTP
                    $phpmail->SMTPDebug = 1;
                    $phpmailResposta->Host = EMAIL_HOST;
                    $phpmailResposta->Port = EMAIL_PORT;
                    $phpmailResposta->SMTPSecure = 'ssl';
                    $phpmailResposta->SMTPAuth = true;
                    $phpmailResposta->Username = EMAIL_USER; //Email SMTP
                    $phpmailResposta->Password = EMAIL_PASS; //Senha SMTP

                    $phpmailResposta->IsHTML(true);
                    $phpmailResposta->setFrom(EMAIL_USER, $nome);
                    $phpmailResposta->addAddress(EMAIL_USER, $assunto);
                    $phpmailResposta->Subject = $assunto;

                    $phpmailResposta->msgHTML(
                        "Nome: $nome <br>
                        E-Mail: $email <br>
                        Telefone: $tel <br>
                        Mensagem: $msg"
                    );
                    $phpmailResposta->AltBody =  "Nome: $nome <br>
                    E-Mail: $email <br>
                    Telefone: $tel <br>
                    Mensagem: $msg";

                    $phpmail->send();

                    $dados = array(
                        'mensagem' => 'obrigado pelo seu contato, em breve responderemos',
                        'status' => 'sucesso'
                    );

                    $this->carregarViews('contato', $dados);

                    //EMAIL DE RESPOSTA


                } catch (Exception $e) {
                    $dados = array(
                        'mensagem' => 'obrigado pelo seu contato, em breve responderemos',
                        'status' => 'erro',
                        'nome' => $nome,
                        'email' => $email
                    );

                    error_log('Erro ao enviar o email' . $phpmail->ErrorInfo);

                    $this->carregarViews('contato', $dados);

                    //FIM TRY

                }

            }//FIM DO if que testa os campos estão preenchidos

        }else{
            $dados = array();
            $this->carregarViews('contato', $dados);
        }
    }
}
