<?php
include "conexao.php";

$sql = "SELECT * FROM tb_funcionarios WHERE setor ='Suporte'"; 
$consultar = $pdo->prepare($sql);

try {
    $consultar->execute();
    $resultados = $consultar->fetchAll(PDO::FETCH_ASSOC);

    if (count($resultados) > 0) {
        echo "
        <div class='titulo'>
            <h1>Suporte</h1>
        </div>
    ";
        foreach ($resultados as $item) {
            $matricula = $item['matricula'];
            $nome = $item['nome'];
            $setor = $item['setor'];
            $situacao = $item['situacao'];
            echo "
                <div class='cartoes'>
                    <b>Matrícula:</b> <span class='matricula'>$matricula</span> <br>
                    <b>Nome:</b> <span class='nome'>$nome</span> <br>
                    <b>Setor:</b> <span class='setor'>$setor</span> <br>
                    <b>Situação:</b> <span class='situacao'>$situacao</span> <br>
                </div>
            ";
        }
    } else {
        echo "Nenhum funcionário encontrado no setor Suporte.";
    }
} catch (PDOException $erro) {
    echo "Falha ao consultar Financeiro: " . $erro->getMessage();
}
?>