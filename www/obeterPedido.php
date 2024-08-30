<?php
$servidor = "localhost";
$banco = "id21427092_banco";
$usuario = "id21427092_banco";
$senha = "12345678A*a";

try {
    // Conexão com o banco de dados
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para selecionar todos os pedidos
    $sql = "SELECT * FROM pedido";
    $declaracao = $conexao->prepare($sql);
    $declaracao->execute();

    // Obtém os pedidos em formato de array associativo
    $pedidos = $declaracao->fetchAll(PDO::FETCH_ASSOC);

    // Retorna os pedidos em formato JSON
    echo json_encode($pedidos);
} catch(PDOException $e) {
    // Em caso de erro na conexão ou na consulta, exibe uma mensagem de falha
    echo "Falhou: " . $e->getMessage();
}
?>
