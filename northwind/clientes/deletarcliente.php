<?php
    if(isset($_POST['deletar'])) {
        $sql = "DELETE from clientes where IDCliente = :IDCliente";
        $parse = $conn->prepare($sql);
        $parse->execute(array("IDCliente" => $_GET['codigo']));
        header("Location: ?pagina=p_listacliente");
    }
?>
<h1> Deletar Produto</h1>

<?php
    $sql ="SELECT * from clientes where IDCliente = :IDCliente";
    $consulta = $conn->prepare($sql);
    $consulta->execute(array("IDCliente" => $_GET['codigo']));
    $linha = $consulta->fetch();

    print_r($linha);
?>
<form method="post">
    <input type="hidden" name="codigo">
    <input type="submit" name="deletar" value="Deletar">
</form>
