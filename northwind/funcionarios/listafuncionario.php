

<?php
    $sql = "SELECT (Sobrenome, Nome, Titulo, TituloCortesia, DataNac, DataAdmissao, Endereco, Cidade,
                    Regiao, cep, Pais, TelefoneResidencial, Extensao, Foto, Notas, Reportase, FotoCaminho
            from funcionarios ";
    $consulta = $conn->prepare($sql);
    $resultado = $consulta->execute();

    $dados = $conn->query($sql);

?>
<div class="border m-5" >
    <h1>Lista de Funcionários</h1>
    <table class="table table-hover table-bordered table-striped">
        <tr>
            <td>Código</td>
            <td>Sobrenome</td>
            <td>Nome</td>
            <td>Titulo</td>
            <td>Titulo Cortesia</td>
            <td>Data de Nascimento</td>
            <td>Data de Admissão</td>
            <td>Endereço</td>
            <td>Cidade</td>
            <td>Região</td>
            <td>CEP</td>
            <td>País</td>
            <td>Telefone Residencial</td>
            <td>Extensao</td>
            <td>Foto</td>
            <td>Notas</td>
            <td>Reportase</td>
            <td>Foto Caminho</td>
            <td>Ações</td>

        </tr>
    <?php
        foreach($dados as $linha) {
            ?>
            <tr>
                <td><?php echo $linha['Sobrenome'];?></td>
                <td><?php echo $linha['Nome'];?></td>
                <td><?php echo $linha['Titulo'];?></td>
                <td><?php echo $linha['TituloCortesia'];?></td>
                <td><?php echo $linha['DataNac'];?></td>
                <td><?php echo $linha['DataAdmissao'];?></td>
                <td><?php echo $linha['Endereco'];?></td>
                <td><?php echo $linha['Cidade'];?></td>
                <td><?php echo $linha['Regiao'];?></td>
                <td><?php echo $linha['cep'];?></td>
                <td><?php echo $linha['Pais'];?></td>
                <td><?php echo $linha['TelefoneResidencial'];?></td>
                <td><?php echo $linha['Extensao'];?></td>
                <td><?php echo $linha['Foto'];?></td>
                <td><?php echo $linha['Notas'];?></td>
                <td><?php echo $linha['Reportase'];?></td>
                <td><?php echo $linha['FotoCaminho'];?></td>
                <td>
                    <a href="?pagina=p_atualizarfuncionario&codigo=<?php echo $linha['IDFuncionario']; ?>" class="btn btn-outline-primary">Atualizar</a>
                    <a href="?pagina=p_deletarfuncionario&codigo=<?php echo $linha['IDFuncionario']; ?>" class="btn btn-outline-danger">Deletar</a>
                </td>
            </tr>
            <?php
        }
    ?>
    </table>
</div>