<?php

$servidor = "localhost";
$banco = "id21427092_banco";
$usuario = "id21427092_banco";
$senha = "12345678A*a";

try {
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $dados = json_decode(file_get_contents("php://input"), true);

        if (isset($dados['cliente']) && !empty($dados['cliente']) &&
            isset($dados['pedido']) && !empty($dados['pedido']) &&
            isset($dados['quantidade']) && !empty($dados['quantidade'])) {
            
            $cliente_id = $dados['cliente'];
            $id = $dados['pedido'];
            $quantidade = $dados['quantidade'];

            $sql = 'INSERT INTO pedidoFinal (cliente_id, id, quant) VALUES (:cliente_id, :pedido, :quantidade)';
            $declaracao = $conexao->prepare($sql);
            $declaracao->bindParam(':cliente_id', $cliente_id);
            $declaracao->bindParam(':pedido', $id);
            $declaracao->bindParam(':quantidade', $quantidade);
            $declaracao->execute();

            echo "Pedido cadastrado com sucesso!";
        } else {
            echo "Por favor, preencha todos os campos obrigatórios.";
        }
    }
} catch(PDOException $e) {
    echo "Falhou: " . $e->getMessage();
}
?>
