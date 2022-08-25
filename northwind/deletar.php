<?php
    if(isset($_POST['deletar'])) {
        $sql = "DELETE from produtos where IDProduto = :IDProduto";
        $parse = $conn->prepare($sql);
        $parse->execute(array("IDProduto" => $_GET['codigo']));
        header("Location: ?pagina=p_prod_forn");
    }
?>
<h1> Deletar Produto</h1>

<?php
    $sql ="SELECT * from produtos where IDProduto = :IDProduto";
    $consulta = $conn->prepare($sql);
    $consulta->execute(array("IDProduto" => $_GET['codigo']));
    $linha = $consulta->fetch();

    print_r($linha);
?>
<form method="post">
    <input type="hidden" name="codigo">
    <input type="submit" name="deletar" value="Deletar">
</form>

