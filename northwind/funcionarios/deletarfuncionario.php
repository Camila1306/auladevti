<?php
    if(isset($_POST['deletar'])) {
        $sql = "DELETE from funcionarios where IDFuncionario = :IDFuncionario";
        $parse = $conn->prepare($sql);
        $parse->execute(array("IDFuncionario" => $_GET['codigo']));
        header("Location: ?pagina=p_listafuncionarios");
    }
?>
<h1> Deletar Produto</h1>

<?php
    $sql ="SELECT * from funcionarios where IDFuncionario = :IDFuncionario";
    $consulta = $conn->prepare($sql);
    $consulta->execute(array("IDFuncionario" => $_GET['codigo']));
    $linha = $consulta->fetch();

    print_r($linha);
?>
<form method="post">
    <input type="hidden" name="codigo">
    <input type="submit" name="deletar" value="Deletar">
</form>