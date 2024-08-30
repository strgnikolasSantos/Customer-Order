<?php
$servidor = "localhost";
$banco = "id21427092_banco";
$usuario = "id21427092_banco";
$senha = "12345678A*a";


try {

    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT id, nome FROM cliente';
    $stmt = $conexao->query($sql);

    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($clientes);
} catch(PDOException $e) {
    echo "Falhou: " . $e->getMessage();
}
?>
