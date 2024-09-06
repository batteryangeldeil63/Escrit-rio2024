<?php
// Define o caminho para a pasta onde o arquivo será salvo
$leadsDir = 'leads/';
$leadsFile = $leadsDir . 'leads.txt';

// Verifica se a pasta 'leads' existe, se não, cria
if (!is_dir($leadsDir)) {
    mkdir($leadsDir, 0777, true);
}

// Coleta os dados do formulário
$email = filter_var(trim($_POST['EMAIL']), FILTER_SANITIZE_EMAIL);
$phone = filter_var(trim($_POST['PHONE']), FILTER_SANITIZE_STRING);

// Valida o email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Email inválido.');
}

// Monta a linha que será salva no arquivo
$lead = $email . "\t" . $phone . "\n";

// Salva os dados no arquivo
file_put_contents($leadsFile, $lead, FILE_APPEND | LOCK_EX);

// Redireciona o usuário para uma página de agradecimento ou para o mesmo formulário com uma mensagem de sucesso
header('Location: https://captura-de-lead.netlify.app/parabens.html');
exit();
?>
