

<?php
    $sql = "SELECT NomeCompanhia, NomeContato, TituloContato, Endereco, Cidade, Regiao, cep, Pais, Telefone, Fax
            from clientes ";
    $consulta = $conn->prepare($sql);
    $resultado = $consulta->execute();

    $dados = $conn->query($sql);

?>
<div class="border m-5" >
    <h1>Lista de Clientes</h1>
    <table class="table table-hover table-bordered table-striped">
        <tr>
            <td>Código</td>
            <td>Nome Companhia</td>
            <td>Nome Contato</td>
            <td>Titulo Contato</td>
            <td>Endereço</td>
            <td>Cidade</td>
            <td>Região</td>
            <td>CEP</td>
            <td>País</td>
            <td>Telefone</td>
            <td>Fax</td>
            <td>Ações</td>

        </tr>
    <?php
        foreach($dados as $linha) {
            ?>
            <tr>
                <td><?php echo $linha['IDFornecedor'];?></td>
                <td><?php echo $linha['NomeCompanhia'];?></td>
                <td><?php echo $linha['NomeContato'];?></td>
                <td><?php echo $linha['TituloContato'];?></td>
                <td><?php echo $linha['Endereco'];?></td>
                <td><?php echo $linha['Cidade'];?></td>
                <td><?php echo $linha['Regiao'];?></td>
                <td><?php echo $linha['cep'];?></td>
                <td><?php echo $linha['Pais'];?></td>
                <td><?php echo $linha['Telefone'];?></td>
                <td><?php echo $linha['Fax'];?></td>
                <td>
                    <a href="?pagina=p_atualizarcliente&codigo=<?php echo $linha['IDCliente']; ?>" class="btn btn-outline-primary">Atualizar</a>
                    <a href="?pagina=p_deletarcliente&codigo=<?php echo $linha['IDCliente']; ?>" class="btn btn-outline-danger">Deletar</a>
                </td>
            </tr>
            <?php
        }
    ?>
    </table>
</div>