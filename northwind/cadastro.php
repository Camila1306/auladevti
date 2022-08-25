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

    if(isset($_POST['gravar'])) {
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
                $sql = "INSERT into produtos(NomeProduto, PrecoUnitario, IDCategoria, IDFornecedor, UnidadesEmEstoque, NivelDeReposicao, UnidadesEmOrdem, QuantidadePorUnidade, Descontinuado)
                                    values ( :NomeProduto, :PrecoUnitario, :IDCategoria, :IDFornecedor, :UnidadesEmEstoque, :NivelDeReposicao, :UnidadesEmOrdem, :QuantidadePorUnidade, :Descontinuado)";
                $consulta = $conn->prepare($sql);
                $consulta->execute($valores);
                echo '<div class="alert alert-success">Cadastro realizado com sucesso!</div>';
            } catch (error) {
                echo '<div class="alert alert-danger">Erro! Cadastro não realizado.</div>';
            }
        } else {
            echo '<div class="alert alert-warning">Informe os campos obrigatórios!</div>';
        }
    }
?>
<form class="row g-3" method="post">
  <div class="col-md-6">
    <label for="nome_produto" class="form-label">Nome do Produto</label>
    <input type="text" class="form-control" id="nome_produto" name="nome_produto">
  </div>
  <div class="col-md-6">
    <label for="preco_produto" class="form-label">Preço Unitário</label>
    <input type="text" class="form-control" id="preco_produto" name="preco_produto">
  </div>
  <div class="col-md-4">
    <label for="categoria_produto" class="form-label">Categoria</label>
    <select id="categoria_produto" class="form-select" name="categoria_produto">
    <?php
            $sql = "SELECT * from categorias";
            $consulta = $conn->prepare($sql);
            $consulta->execute();
            echo "<option value=\"00\">Selecionar</option>";
            while($linha = $consulta->fetch()) {
                echo "<option value=\"{$linha['IDCategoria']}\">{$linha['NomeCategoria']}</option>";
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
            echo "<option value=\"00\">Selecionar</option>";
            while($linha = $consulta->fetch()) {
                echo "<option value=\"{$linha['IDFornecedor']}\">{$linha['NomeCompanhia']}</option>";
            }
        ?>  
    </select>
  </div>
  <div class="col-12">
    <label for="estoque_produto" class="form-label">Quantidade em Estoque</label>
    <input type="text" class="form-control" id="estoque_produto" name="estoque_produto">
  </div>
  <div class="col-12">
    <label for="reposicao_produto" class="form-label">Nível de Reposição</label>
    <input type="text" class="form-control" id="reposicao_produto" name="reposicao_produto">
  </div>
  <div class="col-md-6">
    <label for="ordem_produto" class="form-label">Quantidade em Ordem</label>
    <input type="text" class="form-control" id="ordem_produto" name="ordem_produto">
  </div>
  <div class="col-md-6">
    <label for="qntunidade_produto" class="form-label">Quantidade por Unidade</label>
    <input type="text" class="form-control" id="qntunidade_produto" name="qntunidade_produto">
  </div>
  <div class="col-md-4">
    <label for="descontinuado_produto" class="form-label">Descontinuado</label>
    <select id="descontinuado_produto" class="form-select" name="descontinuado_produto">
    <?php
            echo "<option value=\"00\">Selecionar</option>";
            echo "<option>".['Descontinuado']."</option>";
    ?>
    </select>
  </div>
  <div class="col-12">
    <button type="submit" name="gravar" class="btn btn-primary">Cadastrar</button>
  </div>
</form>
