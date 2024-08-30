<?php
$dados = json_decode($_POST['dados']);
$servidor = "localhost";
$banco = "id21427092_banco";
$usuario = "id21427092_banco";
$senha = "12345678A*a";


try {
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'INSERT INTO pedido (item, preco) VALUES (:item, :preco)';
    $declaracao = $conexao->prepare($sql);
    $declaracao->bindParam(':item', $dados->nome);
    $declaracao->bindParam(':preco', $dados->email);
    $resul = $declaracao->execute();
    
    if ($resul) {
        echo "Registro inserido com sucesso";
    } else {
        echo "Falha ao inserir o registro";
    }
} catch(PDOException $e) {
    echo "Falhou: " . $e->getMessage();
}
?>
