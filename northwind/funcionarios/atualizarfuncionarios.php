<div class="border m-5" >
    <h1>Atualizar Funcionários</h1>
</div>
<?php
 
    if(isset($_POST['atualizar'])) {
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
          $sql = "UPDATE funcionarios
                  set Sobrenome = :Sobrenome, 
                  Nome = :Nome, 
                  Titulo = :Titulo, 
                  TituloCortesia = :TituloCortesia,
                  DataNac = :DataNac,
                  DataAdmissao = :DataAdmissao,
                  Endereco  = :Endereco,
                  Cidade = :Cidade, 
                  Regiao = :Regiao, 
                  cep = :cep, 
                  Pais = :Pais, 
                  TelefoneResidencial = :TelefoneResidencial, 
                  Extensao = :Extensao,
                  Foto = :Foto,
                  Notas = :Notas,
                  Reportase = :Reportase,
                  FotoCaminho = :FotoCaminho";
          $atualiza = $conn->prepare($sql);
          $resultado = $atualiza->execute(array("Sobrenome" => $_POST['sobrenome'],
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
          echo '<div class="alert alert-success">Atualizado com sucesso!</div>';
        } catch (error) {
            echo '<div class="alert alert-danger">Erro! Atualização não realizada.</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Informe os campos obrigatórios!</div>';
    }
}
$sql = "SELECT * from funcionarios where IDFuncionario = :IDFuncionario";
$produto = $conn->prepare($sql);
$produto->execute(array("IDFuncionario" => $_GET['codigo']));
                   
$linha = $produto->fetch();
?>
                
<form class="row g-3" method="post">
  <div class="col-md-6">
    <label for="sobrenome" class="form-label">Sobrenome</label>
    <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="<?php echo $linha['Sobrenome']; ?>">
  </div>
  <div class="col-md-6">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $linha['Nome']; ?>">
  </div>
  <div class="col-12">
    <label for="titulo" class="form-label">Titulo</label>
    <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $linha['Titulo']; ?>">
  </div>
  <div class="col-12">
    <label for="titulocortesia" class="form-label">Titulo Cortesia</label>
    <input type="text" class="form-control" id="titulocortesia" name="titulocortesia" value="<?php echo $linha['TituloCortesia']; ?>">
  </div>
  <div class="col-12">
    <label for="datanasc" class="form-label">Data de Nascimento</label>
    <input type="text" class="form-control" id="datanasc" name="datanasc" value="<?php echo $linha['DataNac']; ?>">
  </div>
  <div class="col-12">
    <label for="dataadmissao" class="form-label">Data Admissão</label>
    <input type="text" class="form-control" id="dataadmissao" name="dataadmissao" value="<?php echo $linha['DataAdmissao']; ?>">
  </div>
  <div class="col-12">
    <label for="endereco" class="form-label">Endereco</label>
    <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $linha['Endereco']; ?>">
  </div>
  <div class="col-md-6">
    <label for="cidade" class="form-label">Cidade</label>
    <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $linha['Cidade']; ?>">
  </div>
  </div>  <div class="col-md-6">
    <label for="regiao" class="form-label">Regiao</label>
    <input type="text" class="form-control" id="regiao" name="regiao" value="<?php echo $linha['Regiao']; ?>">
  </div>
  <div class="col-md-6">
    <label for="cep" class="form-label">CEP</label>
    <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $linha['cep']; ?>">
  </div>
  <div class="col-md-6">
    <label for="pais" class="form-label">País</label>
    <input type="text" class="form-control" id="pais" name="pais" value="<?php echo $linha['Pais']; ?>">
  </div>
  <div class="col-md-6">
    <label for="telefoneresidencial" class="form-label">Telefone Residencial</label>
    <input type="text" class="form-control" id="telefoneresidencial" name="telefoneresidencial" value="<?php echo $linha['TelefoneResidencial']; ?>">
  <div class="col-md-6">
    <label for="extensao" class="form-label">Extensao</label>
    <input type="text" class="form-control" id="extensao" name="extensao" value="<?php echo $linha['Extensao']; ?>">
  </div>
  <div class="col-md-6">
    <label for="foto" class="form-label">Foto</label>
    <input type="text" class="form-control" id="foto" name="foto" value="<?php echo $linha['Foto']; ?>">
  </div>
  <div class="col-md-6">
    <label for="notas" class="form-label">Notas</label>
    <input type="text" class="form-control" id="notas" name="notas" value="<?php echo $linha['Notas']; ?>">
  </div>
  <div class="col-md-6">
    <label for="reportase" class="form-label">Reportase</label>
    <input type="text" class="form-control" id="reportase" name="reportase" value="<?php echo $linha['Reportase']; ?>">
  </div>
  <div class="col-md-6">
    <label for="fotocaminho" class="form-label">Foto Caminho</label>
    <input type="text" class="form-control" id="fotocaminho" name="fotocaminho" value="<?php echo $linha['FotoCaminho']; ?>">
  </div>
  <div class="col-12">
    <button type="submit" name="atualizar" class="btn btn-primary">Atualizar</button>
  </div>
</form>
