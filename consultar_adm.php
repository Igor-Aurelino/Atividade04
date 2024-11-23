<?php
include "conexao.php";

$sql = "SELECT * FROM tb_funcionarios WHERE setor ='Administrativo'"; 
$consultar = $pdo->prepare($sql);

try {
    // Executa a consulta
    $consultar->execute();
    
    // Obtém todos os resultados da consulta
    $resultados = $consultar->fetchAll(PDO::FETCH_ASSOC);

    // Verifica se houve resultados
    if (count($resultados) > 0) {
        echo "
            <div class='titulo'>
                <h1>Administrativo</h1>
            </div>
        ";
        foreach ($resultados as $item) {
            $matricula = $item['matricula'];
            $nome = $item['nome'];
            $setor = $item['setor'];
            $situacao = $item['situacao'];
            echo "
                <div class='cartoes'>
                    <b>Matrícula: </b> <span class='matricula'>$matricula</span> <br>
                    <b>Nome:</b> <span class='nome'>$nome</span> <br>
                    <b>Setor:</b> <span class='setor'>$setor</span> <br>
                    <b>Situação:</b> <span class='situacao'>$situacao</span> <br>
                </div>
            ";
        }
    } else {
        // Caso não haja nenhum resultado
        echo "Nenhum funcionário encontrado no setor Administrativo.";
    }
} catch (PDOException $erro) {
    // Exibe detalhes do erro PDO
    echo "Falha ao consultar Administrativo: " . $erro->getMessage();
}
?>
