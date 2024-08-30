<?php
$dados = json_decode($_POST['dados']);
$servidor = "localhost";
$banco = "id21427092_banco";
$usuario = "id21427092_banco";
$senha = "12345678A*a";

try {
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'UPDATE cliente SET nome = :nome, email = :email WHERE id = :id';
    $declaracao = $conexao->prepare($sql);
    $declaracao->bindParam(':id', $dados->id);
    $declaracao->bindParam(':nome', $dados->nome);
    $declaracao->bindParam(':email', $dados->email);
    $resul = $declaracao->execute();
    
    if ($resul) {
        echo "Registro alterado com sucesso";
    } else {
        echo "Falha ao alterar o registro";
    }
} catch(PDOException $e) {
    echo "Falhou: " . $e->getMessage();
}
?>
