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
            $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_SPECIAL_CHARS);
            $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_SPECIAL_CHARS);
            $msg = filter_input(INPUT_POST, 'msg', FILTER_SANITIZE_SPECIAL_CHARS);

            //  var_dump($nome);
            //  var_dump($email);
            //  var_dump($tel);
            //  var_dump($assunto);
            //  var_dump($msg);
            //  var_dump($_SERVER);


            if ($nome && $email && $tel && $msg) {

                //instanciar o model de contato
                $contatoModel = new Contato();

                $salvar = $contatoModel->salvarEmail(
                $nome, 
                $email, 
                $tel, 
                $assunto, 
                $msg);

                if ($salvar) {
                    require_once("vendors/phpmailer/PHPMailer.php");
                    require_once("vendors/phpmailer/SMTP.php");
                    require_once("vendors/phpmailer/Exception.php");


                    $phpmail = new PHPMailer\PHPMailer\PHPMailer(); //Gerando variavel de email

                    try {
                        $phpmail->isSMTP(); //envio por SMTP
                        $phpmail->SMTPDebug = 0;
                        $phpmail->Host = EMAIL_HOST;
                        $phpmail->Port = EMAIL_PORT;
                        $phpmail->SMTPSecure = 'ssl';
                        $phpmail->SMTPAuth = true;
                        $phpmail->Username = EMAIL_USER; //Email SMTP
                        $phpmail->Password = EMAIL_PASS; //Senha SMTP

                        $phpmail->IsHTML(true);
                        $phpmail->setFrom(EMAIL_USER, $nome);
                        $phpmail->addAddress(EMAIL_USER, $assunto);
                        $phpmail->Subject = $assunto;

                        $phpmail->msgHTML(
                            "Nome: $nome <br>
                        E-Mail: $email <br>
                        Telefone: $tel <br>
                        Mensagem: $msg"
                        );
                        $phpmail->AltBody =  "Nome: $nome <br>
                    E-Mail: $email <br>
                    Telefone: $tel <br>
                    Mensagem: $msg";

                        $phpmail->send();

                        $dados = array(
                            'mensagem' => 'obrigado pelo seu contato, em breve responderemos',
                            'status' => 'sucesso'
                        );

                        $this->carregarViews('contato', $dados);

                        //EMAIL DE 


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
                }

                //reconheçer estrutura PHPMAILER




            } //FIM DO if que testa os campos estão preenchidos

        } else {
            $dados = array();
            $this->carregarViews('contato', $dados);
        }
    }
}
