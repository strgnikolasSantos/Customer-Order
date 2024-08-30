<?php
$servidor = "localhost";
$banco = "id21427092_banco";
$usuario = "id21427092_banco";
$senha = "12345678A*a";


$dados = json_decode($_POST['x']);

try {
    $conn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM cliente WHERE nome LIKE :valor';
    $declaracao = $conn->prepare($sql);
    $declaracao->bindValue(':valor', '%' . $dados->valor . '%');
    $declaracao->execute();

    $tabela = $declaracao->fetchAll(PDO::FETCH_ASSOC);
    $saida = json_encode($tabela);

    echo $saida;

} catch (PDOException $e) {
    echo "Falhou: " . $e->getMessage();
}
?>
