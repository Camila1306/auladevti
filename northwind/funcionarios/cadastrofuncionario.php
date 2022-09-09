<div class="border m-5" >
    <h1>Cadastro de Funcionário</h1>
</div>

<?php
  if(isset($_POST['gravar'])) {
    $erro = false;

    (isset($_POST['sobrenome']) && empty($_POST['sobrenome']))?$erro=true:'';
    (isset($_POST['nome']) && empty($_POST['nome']))?$erro=true:'';
    (isset($_POST['titulo']) && empty($_POST['titulo']))?$erro=true:'';
    (isset($_POST['titulocortesia']) && empty($_POST['titulocortesia']))?$erro=true:'';
    (isset($_POST['datanasc']) && empty($_POST['datanasc']))?$erro=true:'';
    (isset($_POST['dataadmissao']) && empty($_POST['dataadmissao']))?$erro=true:'';
    (isset($_POST['endereço']) && empty($_POST['endereço']))?$erro=true:'';
    (isset($_POST['cep']) && empty($_POST['cep']))?$erro=true:'';
    (isset($_POST['pais']) && empty($_POST['pais']))?$erro=true:'';
    (isset($_POST['telefoneresidencial']) && empty($_POST['telefoneresidencial']))?$erro=true:'';
    (isset($_POST['extensao']) && empty($_POST['extensao']))?$erro=true:'';
    (isset($_POST['foto']) && empty($_POST['foto']))?$erro=true:'';
    (isset($_POST['notas']) && empty($_POST['notas']))?$erro=true:'';
    (isset($_POST['fotocaminho']) && empty($_POST['fotocaminho']))?$erro=true:'';

    if(!$erro) {
      try {
        $sql = "INSERT into funcionarios(Sobrenome, Nome, Titulo, TituloCortesia, DataNac, DataAdmissao, Endereco, Cidade,
                                         Regiao, cep, Pais, TelefoneResidencial, Extensao, Foto, Notas, Reportase, FotoCaminho)
                      values(:Sobrenome, :Nome, :Titulo, :TituloCortesia, :DataNac, :DataAdmissao, :Endereco, :Cidade,
                                         :Regiao, :cep, :Pais, :TelefoneResidencial, :Extensao, :Foto, :Notas, :Reportase, :FotoCaminho)";
        $consulta = $conn->prepare($sql);
        $resultado = $consulta->execute(array("Sobrenome" => $_POST['sobrenome'],
                                              "Nome" => $_POST['nome'],
                                              "Titulo" => $_POST['titulo'],
                                              "TituloCortesia" => $_POST['titulocortesia'],
                                              "DataNac" => $_POST['datanasc'],
                                              "DataAdmissao" => $_POST['dataadmissao'],
                                              "Endereco" => $_POST['endereco'],
                                              "Cidade" => $_POST['cidade'],
                                              "Regiao" => $_POST['regiao'],
                                              "cep" => $_POST['cep'],
                                              "Pais" => $_POST['pais'],
                                              "TelefoneResidencial" => $_POST['telefoneresidencial'],
                                              "Extensao" => $_POST['extensao'],
                                              "Foto" => $_POST['foto'],
                                              "Notas" => $_POST['notas'],
                                              "Reportase" => $_POST['reportase'],
                                              "FotoCaminho" => $_POST['fotocaminho']));
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
    <label for="sobrenome" class="form-label">Sobrenome</label>
    <input type="text" class="form-control" id="sobrenome" name="sobrenome">
  </div>
  <div class="col-md-6">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" >
  </div>
  <div class="col-12">
    <label for="titulo" class="form-label">Titulo</label>
    <input type="text" class="form-control" id="titulo" name="titulo">
  </div>
  <div class="col-12">
    <label for="titulocortesia" class="form-label">Titulo Cortesia</label>
    <input type="text" class="form-control" id="titulocortesia" name="titulocortesia">
  </div>
  <div class="col-12">
    <label for="datanasc" class="form-label">Data de Nascimento</label>
    <input type="text" class="form-control" id="datanasc" name="datanasc">
  </div>
  <div class="col-12">
    <label for="dataadmissao" class="form-label">Data Admissão</label>
    <input type="text" class="form-control" id="dataadmissao" name="dataadmissao">
  </div>
  <div class="col-12">
    <label for="endereco" class="form-label">Endereco</label>
    <input type="text" class="form-control" id="endereco" name="endereco">
  </div>
  <div class="col-md-6">
    <label for="cidade" class="form-label">Cidade</label>
    <input type="text" class="form-control" id="cidade" name="cidade">
  </div>
  </div>  <div class="col-md-6">
    <label for="regiao" class="form-label">Regiao</label>
    <input type="text" class="form-control" id="regiao" name="regiao">
  </div>
  <div class="col-md-6">
    <label for="cep" class="form-label">CEP</label>
    <input type="text" class="form-control" id="cep" name="cep">
  </div>
  <div class="col-md-6">
    <label for="pais" class="form-label">País</label>
    <input type="text" class="form-control" id="pais" name="pais">
  </div>
  <div class="col-md-6">
    <label for="telefoneresidencial" class="form-label">Telefone Residencial</label>
    <input type="text" class="form-control" id="telefoneresidencial" name="telefoneresidencial">
  <div class="col-md-6">
    <label for="extensao" class="form-label">Extensao</label>
    <input type="text" class="form-control" id="extensao" name="extensao" >
  </div>
  <div class="col-md-6">
    <label for="foto" class="form-label">Foto</label>
    <input type="text" class="form-control" id="foto" name="foto">
  </div>
  <div class="col-md-6">
    <label for="notas" class="form-label">Notas</label>
    <input type="text" class="form-control" id="notas" name="notas">
  </div>
  <div class="col-md-6">
    <label for="reportase" class="form-label">Reportase</label>
    <input type="text" class="form-control" id="reportase" name="reportase">
  </div>
  <div class="col-md-6">
    <label for="fotocaminho" class="form-label">Foto Caminho</label>
    <input type="text" class="form-control" id="fotocaminho" name="fotocaminho">
  </div>
  <div class="col-12">
    <button type="submit" name="gravar" class="btn btn-primary">Cadastrar</button>
  </div>
</form>
