<?php
// Conexão com o banco de dados
$servidor = "localhost";
$banco = "id21427092_banco";
$usuario = "id21427092_banco";
$senha = "12345678A*a";

try {
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obter os dados de pedidoFinal, cliente e pedido
    $sql = "
        SELECT cliente.nome AS nome_cliente, pedido.item, pedidoFinal.quant AS quantidade
        FROM pedidoFinal
        JOIN cliente ON pedidoFinal.cliente_id = cliente.id
        JOIN pedido ON pedidoFinal.id = pedido.id
    ";

    $declaracao = $conexao->prepare($sql);
    $declaracao->execute();

    // Obter resultados como array associativo
    $resultados = $declaracao->fetchAll(PDO::FETCH_ASSOC);

    // Retornar resultados como JSON
    echo json_encode($resultados);

} catch(PDOException $e) {
    echo "Falhou: " . $e->getMessage();
}
?>
