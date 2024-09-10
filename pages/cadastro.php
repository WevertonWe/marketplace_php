<?php
    if(isset($_POST['acao'])){
        $login = strip_tags($_POST['login']);
        $senha = strip_tags($_POST['senha']);
        $nome = $_POST['nome'];
        
        $sql = MySql::getConn()->prepare("SELECT * FROM usuarios WHERE login = ?");
        $sql->execute(array($login));

        if($sql->rowCount() == 1){
            //Loguei
            echo '<script>alert("Ja existe este login..")</script>';
            echo '<script>location.href="/DankiCode/PHP/marketplace_php/"</script>';
            die();
        }else{
            $sql = MySql::getConn()->prepare("INSERT INTO usuarios VALUES (null,?,?,?)");
            $sql->execute(array($login,$senha,""));
            echo '<script>alert("Cadastro feito com sucesso!")</script>';
        }
    }

    if(isset($_SESSION['login'])){
        echo '<script>location.href="/DankiCode/PHP/marketplace_php/"</script>';
    }
?>

<div class="container">
<form method="post">

    <h1 class="h3 mb-3 fw-normal">Cadastro</h1>
    <!-- Email Entrada -->
    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="form2Example1">Nome</label>
        <input name="nome" type="text" id="form2Example1" class="form-control" placeholder="Weverton Wilson"/>
    </div>

    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="form2Example1">Email</label>
        <input name="login" type="text" id="form2Example1" class="form-control" placeholder="contato@hotmail.com"/>
    </div>

    <!-- Senha Entrada -->
    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="form2Example2">Senha</label>
        <input name="senha" type="password" id="form2Example2" class="form-control" placeholder="Senha" />
    </div>

    <!-- 2 column grid layout for inline styling -->
    <div class="row mb-4">
        <div class="col d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check">
                <input class="form-check- input" type="checkbox" value="" id="form2Example31" checked />
                <label class="form-check-label" for="form2Example31"> Remember me </label>
            </div>
        </div>

        <div class="col">
            <!-- Simple link -->
            <a href="#!">Forgot password?</a>
        </div>
    </div>

    <!-- Submit button -->
    <button name="acao" type="submit" data-mdb-button-init data-mdb-ripple-init class="w-100 btn btn-lg btn-primary mb-5">Sign in</button>

</form>
</div><!--container-->