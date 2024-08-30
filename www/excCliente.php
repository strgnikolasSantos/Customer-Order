<?php
$dados = json_decode($_POST['dados']);
$servidor = "localhost";
$banco = "id21427092_banco";
$usuario = "id21427092_banco";
$senha = "12345678A*a";


try {
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

    $sql = 'DELETE FROM cliente WHERE id = :id';
    $declaracao = $conexao->prepare($sql);
    $declaracao->bindParam(':id', $dados->id);
    $resul = $declaracao->execute();
    
    if ($resul) {
        echo "Registro excluído com sucesso";
    } else {
        echo "Falha ao excluir o registro";
    }
} catch(PDOException $e) {
    echo "Falhou: " . $e->getMessage();
}
?>
