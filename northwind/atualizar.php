<div class="border m-5" >
    <h1>Cadastro de Produtos</h1>
</div>
<?php

    function fValida($valores) {
      $msg = "";
      $valido = true;
      if(empty($valores['nome_produto'])) {
        $msg = "Nome do Produto Inválido";
        $valido = false;
      }
      if(empty($valores['preco_produto'])) {
        $msg = "Preço do Produto Inválido";
        $valido = false;
      }
      if(empty($valores['nome_produto'])) {
        $msg = "Nome Inválido";
        $valido = false;
      } elseif($valores['categoria_produto']=='00') {
        $msg = "Selecione a Categoria";
        $valido = false;
      } elseif($valores['fornecedor_produto']=='00') {
        $msg = "Selecione o Fornecedor";
        $valido = false;
      } elseif(empty($valores['estoque_produto'])) {
        $msg = "Estoque Inválido";
        $valido = false;
      } elseif(empty($valores['reposicao_produto'])) {
        $msg = "Reposição Inválido";
        $valido = false;
      } elseif(empty($valores['ordem_produto'])) {
        $msg = "Quantidade em Ordem Inválido";
        $valido = false;
      } elseif(empty($valores['qntunidade_produto'])) {
        $msg = "Quantidade por Unidade Inválido";
        $valido = false;
      } elseif(empty($valores['descontinuado_produto'])) {
        $msg = "Selecione se o Produto Descontinuado";
        $valido = false;
      }
      echo "<h3>".$msg."</h3>";
      return $valido;

    }

    if(isset($_POST['atualizar'])) {
        $valores = array( "NomeProduto" => $_POST['nome_produto'],
                          "PrecoUnitario" => $_POST['preco_produto'],
                          "IDCategoria" => $_POST['categoria_produto'],
                          "IDFornecedor" => $_POST['fornecedor_produto'],
                          "UnidadesEmEstoque" => $_POST['estoque_produto'],
                          "NivelDeReposicao" => $_POST['reposicao_produto'],
                          "UnidadesEmOrdem" => $_POST['ordem_produto'],
                          "QuantidadePorUnidade" => $_POST['qntunidade_produto'],
                          "Descontinuado" => $_POST['descontinuado_produto']);
        if(fValida($valores)) {
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
                $atualiza->execute($valores);
                echo '<div class="alert alert-success">Cadastro realizado com sucesso!</div>';
            } catch (error) {
                echo '<div class="alert alert-danger">Erro! Cadastro não realizado.</div>';
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
        <input class="form-check-input" type="radio" name="descontinuado_produto" id="descontinuado_produto2" value="<?php echo $linha['Descontinuado']; ?>">
        <label class="form-check-label" for="descontinuado_produto2">
            T
        </label>
    </div> 
  </div>
  <div class="col-12">
    <button type="submit" name="atualizar" class="btn btn-primary">Atualizar</button>
  </div>
</form>
