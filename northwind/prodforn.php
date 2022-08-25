

<?php
    $sql = "SELECT p.IDProduto, p.NomeProduto, ct.NomeCategoria, p.QuantidadePorUnidade, p.PrecoUnitario, p.UnidadesEmEstoque, p.UnidadesEmOrdem, p.NivelDeReposicao, p.Descontinuado, pf.NomeCompanhia
            from produtos p
            inner join fornecedores pf on (p.IDFornecedor = pf.IDFornecedor)
            inner join categorias ct on (p.IDCategoria = ct.IDCategoria);";
    $consulta = $conn->prepare($sql);
    $resultado = $consulta->execute();

    $dados = $conn->query($sql);

?>
<div class="border m-5" >
    <h1>Lista de Produtos</h1>
    <table class="table table-hover table-bordered table-striped">
        <tr>
            <td>Código</td>
            <td>Descrição</td>
            <td>Preço Unitário</td>
            <td>Categoria</td>
            <td>Fornecedor</td>
            <td>Quantidade em Estoque</td>
            <td>Nivel de Reposição</td>
            <td>Quantidade em Ordem</td>
            <td>Quantidade Por Unidade</td>
            <td>Descontinuado</td>
            <td>Ações</td>

        </tr>
    <?php
        foreach($dados as $linha) {
            ?>
            <tr>
                <td><?php echo $linha['IDProduto'];?></td>
                <td><?php echo $linha['NomeProduto'];?></td>
                <td><?php echo $linha['PrecoUnitario'];?></td>
                <td><?php echo $linha['NomeCategoria'];?></td>
                <td><?php echo $linha['NomeCompanhia'];?></td>
                <td><?php echo $linha['UnidadesEmEstoque'];?></td>
                <td><?php echo $linha['NivelDeReposicao'];?></td>
                <td><?php echo $linha['UnidadesEmOrdem'];?></td>
                <td><?php echo $linha['QuantidadePorUnidade'];?></td>
                <td><?php echo $linha['Descontinuado'];?></td>
                <td>
                    <a href="?pagina=p_atualizar&codigo=<?php echo $linha['IDProduto']; ?>" class="btn btn-outline-primary">Atualizar</a>
                    <a href="?pagina=p_deletar&codigo=<?php echo $linha['IDProduto']; ?>" class="btn btn-outline-danger">Deletar</a>
                </td>
            </tr>
            <?php
        }
    ?>
    </table>
</div>