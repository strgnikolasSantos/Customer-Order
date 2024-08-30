<?php
$servidor = "localhost";
$banco = "id21427092_banco";
$usuario = "id21427092_banco";
$senha = "12345678A*a";


// Verifica se o ID foi recebido na requisição POST
if(isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        // Conexão com o banco de dados
        $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta SQL para selecionar os dados do cliente com base no ID
        $sql = 'SELECT * FROM cliente WHERE id = :id';
        $declaracao = $conexao->prepare($sql);
        $declaracao->bindParam(':id', $id);
        $declaracao->execute();

        // Obtém os dados do cliente em formato de array associativo
        $tabela = $declaracao->fetchAll(PDO::FETCH_ASSOC);

        // Retorna os dados do cliente em formato JSON
        echo json_encode($tabela);
    } catch(PDOException $e) {
        // Em caso de erro na conexão ou na consulta, exibe uma mensagem de falha
        echo "Falhou: " . $e->getMessage();
    }
} else {
    // Caso o ID não seja recebido na requisição POST, exibe uma mensagem de erro
    echo "ID do cliente não fornecido.";
}
?>
