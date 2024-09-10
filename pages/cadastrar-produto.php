<?php
    if(!isset($_SESSION['login'])){
        echo '<script>location.href="/DankiCode/PHP/marketplace_php/"</script>';
        die();
    }
    if(isset($_POST['acao'])){
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $conteudo = $_POST['conteudo'];

        $sql = MySql::getConn()->prepare("INSERT INTO produtos VALUES (null,?,?,?,?,?)");
        $sql->execute(array($nome, $descricao, $preco, $conteudo, $_SESSION['id']));
        echo '<script>alert("Cadastro feito com sucesso!")</script>';
    }

?>
<div class="container">
<form method="post">

    <h1 class="h3 mb-3 fw-normal">Cadastro</h1>
    <!-- Email Entrada -->
    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="form2Example1">Nome do Produto</label>
        <input name="nome" type="text" id="form2Example1" class="form-control"/>
    </div>

    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="form2Example1">Descricao</label>
        <input name="descricao" type="text" id="form2Example1" class="form-control"/>
    </div>
    
    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="form2Example1">Preço</label>
        <input name="preco" type="number" id="form2Example1" class="form-control"/>
    </div>
    
    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="form2Example1">Conteúdo</label>
        <input name="conteudo" type="text" id="form2Example1" class="form-control"/>
    </div>


   

    <!-- Submit button -->
    <button name="acao" type="submit" data-mdb-button-init data-mdb-ripple-init class="w-100 btn btn-lg btn-primary mb-5">Cadastro</button>

</form>
</div><!--container-->