<div class="border m-5" >
    <h1>Atualizar Fornecedor</h1>
</div>
<?php
 
    if(isset($_POST['atualizar'])) {
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
          $sql = "UPDATE fornecedores
                  set NomeCompanhia = :NomeCompanhia, 
                  NomeContato = :NomeContato, 
                  TItuloContato = :TItuloContato, 
                  Endereco = :Endereco, 
                  Cidade = :Cidade, 
                  cep = :cep, 
                  Pais = :Pais, 
                  Telefone = :Telefone, 
                  Regiao = :Regiao, 
                  Fax = :Fax, 
                  Website = :Website";
          $atualiza = $conn->prepare($sql);
          $resultado = $atualiza->execute(array("NomeCompanhia" => $_POST['nomecompanhia'],
                                   "NomeContato" => $_POST['nomecontato'],
                                   "TItuloContato" => $_POST['titulocontato'],
                                   "Endereco" => $_POST['endereco'],
                                   "Cidade" => $_POST['cidade'],
                                   "cep" => $_POST['cep'],
                                   "Pais" => $_POST['pais'],
                                   "Telefone" => $_POST['telefone'],
                                   "Regiao" => $_POST['regiao'],
                                   "Fax" => $_POST['fax'], 
                                   "Website" => $_POST['website']));
                                   echo '<div class="alert alert-success">Atualizado com sucesso!</div>';
        } catch (error) {
                                   echo '<div class="alert alert-danger">Erro! Atualização não realizada.</div>';
        }
    } else {
                               echo '<div class="alert alert-warning">Informe os campos obrigatórios!</div>';
    }
}
$sql = "SELECT * from fornecedores where IDFornecedor = :IDFornecedor";
$produto = $conn->prepare($sql);
$produto->execute(array("IDFornecedor" => $_GET['codigo']));
                   
$linha = $produto->fetch();
?>
                
<form class="row g-3" method="post">
  <div class="col-md-6">
    <label for="nomecompanhia" class="form-label">Nome Companhia</label>
    <input type="text" class="form-control" id="nomecompanhia" name="nomecompanhia" value="<?php echo $linha['NomeCompanhia']; ?>">
  </div>
  <div class="col-md-6">
    <label for="nomecontato" class="form-label">Nome Contato</label>
    <input type="text" class="form-control" id="nomecontato" name="nomecontato" value="<?php echo $linha['NomeContato']; ?>">
  </div>
  <div class="col-12">
    <label for="titulocontato" class="form-label">Titulo Contato</label>
    <input type="text" class="form-control" id="titulocontato" name="titulocontato" value="<?php echo $linha['TItuloContato']; ?>">
  </div>
  <div class="col-12">
    <label for="endereco" class="form-label">Endereco</label>
    <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $linha['Endereco']; ?>">
  </div>
  <div class="col-md-6">
    <label for="cidade" class="form-label">Cidade</label>
    <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $linha['Cidade']; ?>">
  </div>
  <div class="col-md-6">
    <label for="cep" class="form-label">CEP</label>
    <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $linha['cep']; ?>">
  </div>
</div>  <div class="col-md-6">
  <label for="regiao" class="form-label">Regiao</label>
  <input type="text" class="form-control" id="regiao" name="regiao" value="<?php echo $linha['Regiao']; ?>">
</div>
  <div class="col-md-6">
    <label for="pais" class="form-label">País</label>
    <input type="text" class="form-control" id="pais" name="pais" value="<?php echo $linha['Pais']; ?>">
  </div>
  <div class="col-md-6">
    <label for="telefone" class="form-label">Telefone</label>
    <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $linha['Telefone']; ?>">
  <div class="col-md-6">
    <label for="fax" class="form-label">Fax</label>
    <input type="text" class="form-control" id="fax" name="fax" value="<?php echo $linha['Fax']; ?>">
  </div>
  <div class="col-md-6">
    <label for="website" class="form-label">Web Site</label>
    <input type="text" class="form-control" id="website" name="website" value="<?php echo $linha['Website']; ?>">
  </div>
  <div class="col-12">
    <button type="submit" name="atualizar" class="btn btn-primary">Atualizar</button>
  </div>
</form>
