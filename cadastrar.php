<?php
include "conexao.php";

$nome= $_POST['nome'];
$setor = $_POST['setor'];

$sql = "INSERT INTO tb_funcionarios
        (nome, setor)
        VALUES ( '$nome','$setor')";
$cadastrar = $pdo->prepare($sql);
try{
    $cadastrar->execute();
    if($cadastrar->rowCount()>=1){
        echo "Cadastrado com sucesso";
    }else{
        echo "Erro ao Cadastrar";
    }    
}catch(PDOException $erro){
    echo "Erro ao cadastrar funcionario".$erro->getMessage();
}
?>