<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluir arquivos do PHPMailer
require 'vendor/autoload.php'; // Se estiver usando o Composer
// require 'PHPMailer/PHPMailer.php'; // Se baixou o PHPMailer manualmente

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletando dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    // Instância do PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hrnegocios083@gmail.com';
        $mail->Password = 'tegt fcvi lvoz wlcq';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Destinatário
        $mail->setFrom('tatiane.uehara@planeh.com.br', 'Tatiane Planeh');
        $mail->addAddress('mwdigitalmkt@gmail.com');
        $mail->addAddress('tatiane.m.uehara@gmail.com');

        // Conteúdo do email
        $mail->isHTML(true);
        $mail->Subject = 'Novo contato do site';
        $mail->Body    = "Nome: $nome<br>Telefone: $telefone<br>Email: $email<br><br>Mensagem:<br>$mensagem";
        $mail->AltBody = "Nome: $nome\nTelefone: $telefone\nEmail: $email\n\nMensagem:\n$mensagem";

        $mail->send();
        // Redireciona para a página de agradecimento
        header('Location: obrigado.html');
        exit();
    } catch (Exception $e) {
        echo "Erro ao enviar o email: {$mail->ErrorInfo}";
    }
}
?>