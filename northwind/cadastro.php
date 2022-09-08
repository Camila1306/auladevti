<div class="border m-5" >
    <h1>Cadastro de Produtos</h1>
</div>

<?php
  if(isset($_POST['gravar'])) {
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
        $sql = "INSERT into produtos(NomeProduto, PrecoUnitario, IDCategoria, IDFornecedor, UnidadesEmEstoque, NivelDeReposicao, UnidadesEmOrdem, QuantidadePorUnidade, Descontinuado)
                      values(:NomeProduto, :PrecoUnitario, :IDCategoria, :IDFornecedor, :UnidadesEmEstoque, :NivelDeReposicao, :UnidadesEmOrdem, :QuantidadePorUnidade, :Descontinuado)";
        $consulta = $conn->prepare($sql);
        $resultado = $consulta->execute(array("NomeProduto" => $_POST['nome'],
                                 "PrecoUnitario" => $_POST['preco'],
                                 "IDCategoria" => $_POST['categoria'],
                                 "IDFornecedor" => $_POST['fornecedor'],
                                 "UnidadesEmEstoque" => $_POST['estoque'],
                                 "NivelDeReposicao" => $_POST['reposicao'],
                                 "UnidadesEmOrdem" => $_POST['ordem'],
                                 "QuantidadePorUnidade" => $_POST['qntuni'],
                                 "Descontinuado" => $_POST['descontinuado']));
        echo "<div class=\"alert alert-success\">Cadastro realizado com sucesso!</div>";
      } catch(error) {
        echo "<div class=\"alert alert-danger\">Erro!Cadastro não realizado.</div>";
      }
    } else {
      echo "<div class=\"alert alert-warning\">Informe todos os campos!</div>";
    }

  }
?>

<form class="row g-3" method="post">
  <div class="col-md-6">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome">
  </div>
  <div class="col-md-6">
    <label for="preco" class="form-label">Preço</label>
    <input type="text" class="form-control" id="preco" name="preco">
  </div>
  <div class="col-6">
    <label for="categoria" class="form-label">Categoria</label>
    <select id="categoria" name="categoria" class="form-select">
      <?php
        $sql="SELECT * from categorias";
        $consulta = $conn->prepare($sql);
        $consulta->execute();
        echo "<option value=\"00\"selected>Selecionar</option>";
        while ($linha = $consulta->fetch()) {
          echo "<option value=\"{$linha['IDCategoria']}\">{$linha['NomeCategoria']}</option>";
        }
      ?>
    </select>
  </div>
  <div class="col-6">
    <label for="fornecedor" class="form-label">Fornecedor</label>
    <select id="fornecedor" name="fornecedor" class="form-select">
    <?php
        $sql="SELECT * from fornecedores";
        $consulta = $conn->prepare($sql);
        $consulta->execute();
        echo "<option value=\"00\"selected>Selecionar</option>";
        while ($linha = $consulta->fetch()) {
          echo "<option value=\"{$linha['IDFornecedor']}\">{$linha['NomeCompanhia']}</option>";
        }
      ?>
    </select>
  </div>
  <div class="col-md-4">
    <label for="estoque" class="form-label">Estoque</label>
    <input type="text" class="form-control" id="estoque" name="estoque">
  </div>
  <div class="col-md-4">
    <label for="reposicao" class="form-label">Nivel de Reposição</label>
    <input type="text" class="form-control" id="reposicao" name="reposicao"> 
  </div>
  <div class="col-md-4">
    <label for="ordem" class="form-label">Quantidade em Ordem</label>
    <input type="text" class="form-control" id="ordem" name="ordem">
  </div>
  <div class="col-6">
    <label for="qntuni" class="form-label">Quantidade Por Unidade</label>
    <input type="text" class="form-control" id="qntuni" name="qntuni">
  </div>
  <div class="col-6">
    <label for="descontinuado" class="form-label">Descontinuado</label>
    <select id="descontinuado" name="descontinuado" class="form-select">
      <option selected>T</option>
      <option>F</option>
    </select>
  </div>
  <div class="col-12">
    <button type="submit" name="gravar" class="btn btn-primary">Cadastrar</button>
  </div>
</form>
 