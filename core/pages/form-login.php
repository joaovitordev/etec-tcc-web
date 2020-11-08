<?php
    session_start();

    if(!isset($_SESSION['login'])){
        header("Location: form-login.php");
    }

?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8" />
        <br><br />


</head>

<body>

    <div id="formLogin">
        <form action= "../php_action/login.php" method="post">

            <br/>
            <h1>Login</h1>

            <p><label class="format" for="email">Email</label>
                <input type="email" name="email" /> <br/></p>

            <p><label class="format" for="senha">Senha</label>
                <input type="password" name="senha" /> <br /></p>

            <br/>
            <br/>

            <button type="submit" name="btn-login">Logar</button>

            <a href="form-new-user.php">Novo Usuario</a>

        </form>
    </div>
</body>

</html>