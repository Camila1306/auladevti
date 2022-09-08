<?php
    if(isset($_POST['deletar'])) {
        $sql = "DELETE from fornecedores where IDFornecedor = :IDFornecedor";
        $parse = $conn->prepare($sql);
        $parse->execute(array("IDFornecedor" => $_GET['codigo']));
        header("Location: ?pagina=p_forn");
    }
?>
<h1> Deletar Produto</h1>

<?php
    $sql ="SELECT * from fornecedores where IDFornecedor = :IDFornecedor";
    $consulta = $conn->prepare($sql);
    $consulta->execute(array("IDFornecedor" => $_GET['codigo']));
    $linha = $consulta->fetch();

    print_r($linha);
?>
<form method="post">
    <input type="hidden" name="codigo">
    <input type="submit" name="deletar" value="Deletar">
</form>
