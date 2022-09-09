<div class="border m-5" >
    <h1>Cadastro de Cliente</h1>
</div>

<?php
  if(isset($_POST['gravar'])) {
    $erro = false;

    (isset($_POST['nomecompanhia']) && empty($_POST['nomecompanhia']))?$erro=true:'';
    (isset($_POST['nomecontato']) && empty($_POST['nomecontato']))?$erro=true:'';
    (isset($_POST['titulocontato']) && empty($_POST['titulocontato']))?$erro=true:'';
    (isset($_POST['endereco']) && empty($_POST['endereco']))?$erro=true:'';
    (isset($_POST['cidade']) && empty($_POST['cidade']))?$erro=true:'';
    (isset($_POST['cep']) && empty($_POST['cep']))?$erro=true:'';
    (isset($_POST['pais']) && empty($_POST['pais']))?$erro=true:'';
    (isset($_POST['telefone']) && empty($_POST['telefone']))?$erro=true:'';

    if(!$erro) {
      try {
        $sql = "INSERT into clientes(NomeCompanhia, NomeContato, TituloContato, Endereco, Cidade, Regiao, cep, Pais, Telefone, Fax)
                      values(:NomeCompanhia, :NomeContato, :TituloContato, :Endereco, :Cidade, :Regiao, :cep, :Pais, :Telefone, :Fax)";
        $consulta = $conn->prepare($sql);
        $resultado = $consulta->execute(array("NomeCompanhia" => $_POST['nomecompanhia'],
                                              "NomeContato" => $_POST['nomecontato'],
                                              "TituloContato" => $_POST['titulocontato'],
                                              "Endereco" => $_POST['endereco'],
                                              "Cidade" => $_POST['cidade'],
                                              "Regiao" => $_POST['regiao'],
                                              "cep" => $_POST['cep'],
                                              "Pais" => $_POST['pais'],
                                              "Telefone" => $_POST['telefone'],
                                              "Fax" => $_POST['fax']));
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
    <label for="nomecompanhia" class="form-label">Nome Companhia</label>
    <input type="text" class="form-control" id="nomecompanhia" name="nomecompanhia">
  </div>
  <div class="col-md-6">
    <label for="nomecontato" class="form-label">Nome Contato</label>
    <input type="text" class="form-control" id="nomecontato" name="nomecontato">
  </div>
  <div class="col-md-6">
    <label for="titulocontato" class="form-label">Titulo Contato</label>
    <input type="text" class="form-control" id="titulocontato" name="titulocontato">
  </div>
  <div class="col-md-4">
    <label for="endereco" class="form-label">Endereco</label>
    <input type="text" class="form-control" id="endereco" name="endereco">
  </div>
  <div class="col-md-4">
    <label for="cidade" class="form-label">Cidade</label>
    <input type="text" class="form-control" id="cidade" name="cidade"> 
  </div>
  <div class="col-6">
    <label for="regiao" class="form-label">Região</label>
    <input type="text" class="form-control" id="regiao" name="regiao">
  </div>
  <div class="col-md-4">
    <label for="cep" class="form-label">CEP</label>
    <input type="text" class="form-control" id="cep" name="cep">
  </div>
  <div class="col-6">
    <label for="pais" class="form-label">País</label>
    <input type="text" class="form-control" id="pais" name="pais">
  </div>
  <div class="col-6">
    <label for="telefone" class="form-label">Telefone</label>
    <input type="text" class="form-control" id="telefone" name="telefone">
  </div>
  <div class="col-6">
    <label for="fax" class="form-label">Fax</label>
    <input type="text" class="form-control" id="fax" name="Fax">
  </div>
  <div class="col-12">
    <button type="submit" name="gravar" class="btn btn-primary">Cadastrar</button>
  </div>
</form>