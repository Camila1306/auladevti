<div class="border m-5" >
    <h1>Cadastro de Produtos</h1>
</div>
<?php

    if(isset($_POST['atualizar'])) {
      $erro = false;

      (isset($_POST['nome']) && empty($_POST['nome']))?$erro=true:'';
      (isset($_POST['preco']) && empty($_POST['preco']))?$erro=true:'';
      (isset($_POST['categoria']) && ($_POST['categoria']=='00'))?$erro=true:'';
      (isset($_POST['fornecedor']) && ($_POST['fornecedor']=='00'))?$erro=true:'';
      (isset($_POST['estoque']) && empty($_POST['estoque']))?$erro=true:'';
      (isset($_POST['reposicao']) && empty($_POST['reposicao']))?$erro=true:'';
      (isset($_POST['ordem']) && empty($_POST['ordem']))?$erro=true:'';
      (isset($_POST['qntuni']) && empty($_POST['qntuni']))?$erro=true:''; 
        if(!$erro) {
            try {
                $sql = "UPDATE produtos
                        set  NomeProduto = :NomeProduto,
                        PrecoUnitario = :PrecoUnitario,
                        IDCategoria = :IDCategoria,
                        IDFornecedor =  :IDFornecedor,
                        UnidadesEmEstoque = :UnidadesEmEstoque,
                        NivelDeReposicao = :NivelDeReposicao,
                        UnidadesEmOrdem = :UnidadesEmOrdem,
                        QuantidadePorUnidade = :QuantidadePorUnidade,
                        Descontinuado = :Descontinuado";
                $atualiza = $conn->prepare($sql);
                $atualiza->execute(array( "NomeProduto" => $_POST['nome_produto'],
                                           "PrecoUnitario" => $_POST['preco_produto'],
                                           "IDCategoria" => $_POST['categoria_produto'],
                                           "IDFornecedor" => $_POST['fornecedor_produto'],
                                           "UnidadesEmEstoque" => $_POST['estoque_produto'],
                                           "NivelDeReposicao" => $_POST['reposicao_produto'],
                                           "UnidadesEmOrdem" => $_POST['ordem_produto'],
                                           "QuantidadePorUnidade" => $_POST['qntunidade_produto'],
                                           "Descontinuado" => $_POST['descontinuado_produto']));
                echo '<div class="alert alert-success">Atualização realizada com sucesso!</div>';
            } catch (error) {
                echo '<div class="alert alert-danger">Erro! Atualização não realizada.</div>';
            }
        } else {
            echo '<div class="alert alert-warning">Informe os campos obrigatórios!</div>';
        }
    }
    $sql = "SELECT * from produtos where IDProduto = :IDProduto";
    $produto = $conn->prepare($sql);
    $produto->execute(array("IDProduto" => $_GET['codigo']));

    $linha = $produto->fetch();
?>
<form class="row g-3" method="post">
  <div class="col-md-6">
    <label for="nome_produto" class="form-label">Nome do Produto</label>
    <input type="text" class="form-control" id="nome_produto" name="nome_produto" value="<?php echo $linha['NomeProduto']; ?>">
  </div>
  <div class="col-md-6">
    <label for="preco_produto" class="form-label">Preço Unitário</label>
    <input type="text" class="form-control" id="preco_produto" name="preco_produto" value="<?php echo $linha['PrecoUnitario']; ?>">
  </div>
  <div class="col-md-4">
    <label for="categoria_produto" class="form-label">Categoria</label>
    <select id="categoria_produto" class="form-select" name="categoria_produto">
    <?php
            $sql = "SELECT * from categorias";
            $categorias = $conn->prepare($sql);
            $categorias->execute();
            while($categoria = $categorias->fetch()) {
              if($categoria['IDCategoria'] == $linha['categoria_produto']){
                echo "<option value=\"{$linha['IDCategoria']}\" selected>{$categoria['NomeCategoria']}</option>";
              } else {
                echo "<option value=\"{$linha['IDCategoria']}\">{$categoria['NomeCategoria']}</option>";
              }
            }
        ?>  
    </select>
  </div>
  <div class="col-md-4">
    <label for="fornecedor_produto" class="form-label">Fornecedor</label>
    <select id="fornecedor_produto" class="form-select" name="fornecedor_produto">
        <?php
            $sql = "SELECT * from fornecedores";
            $consulta = $conn->prepare($sql);
            $consulta->execute();
            while($linha = $consulta->fetch()) {
                echo "<option value=\"00\">Selecionar</option>";
                echo "<option value=\"{$linha['IDFornecedor']}\">{$linha['NomeCompanhia']}</option>";
            }
        ?>  
    </select>
  </div>
  <div class="col-12">
    <label for="estoque_produto" class="form-label">Quantidade em Estoque</label>
    <input type="text" class="form-control" id="estoque_produto" name="estoque_produto" value="<?php echo $linha['UnidadesEmEstoque']; ?>">
  </div>
  <div class="col-12">
    <label for="reposicao_produto" class="form-label">Nível de Reposição</label>
    <input type="text" class="form-control" id="reposicao_produto" name="reposicao_produto" value="<?php echo $linha['NivelDeReposicao']; ?>">
  </div>
  <div class="col-md-6">
    <label for="ordem_produto" class="form-label">Quantidade em Ordem</label>
    <input type="text" class="form-control" id="ordem_produto" name="ordem_produto" value="<?php echo $linha['UnidadesEmOrdem']; ?>">
  </div>
  <div class="col-md-6">
    <label for="qntunidade_produto" class="form-label">Quantidade por Unidade</label>
    <input type="text" class="form-control" id="qntunidade_produto" name="qntunidade_produto" value="<?php echo $linha['QuantidadePorUnidade']; ?>">
  </div>
  <div>Descontinuado
    <div class="form-check">
        <input class="form-check-input" type="radio" name="descontinuado_produto" id="descontinuado_produto1" value="<?php echo $linha['Descontinuado']; ?>">
        <label class="form-check-label" for="descontinuado_produto1">
            F
        </label>
    </div>
    <div class="form-check">
    <label for="descontinuado" class="form-label">Descontinuado</label>
    <select id="descontinuado" name="descontinuado" class="form-select">
      <option selected><?php echo $linha['Descontinuado']; ?></option>
      <option>T</option>
      <option>F</option>
    </select>
    </div> 
  </div>
  <div class="col-12">
    <button type="submit" name="atualizar" class="btn btn-primary">Atualizar</button>
  </div>
</form>
