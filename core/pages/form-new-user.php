<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8" />
        <br><br />

</head>

<body>


    <div id="formLogin">
        <form action= "../php_action/create-user.php" method="post">

                        <h1>Novo Usuario</h1>
            <br/>

            <p><label class="format" for="nome">Nome</label>
                <input type="text" name="nome" /> <br/></p>

            <p><label class="format" for="email">Email</label>
                <input type="email" name="email" /> <br/></p>

            <p><label class="format" for="senha">Senha</label>
                <input type="password" name="senha" /> <br /></p>

            <br/>
            <br/>

            <button type="submit" name="btn-new-user">Criar</button>

            

        </form>
        
        <?php
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        session_unset();
        session_destroy();
        ?>
    </div>
</body>

</html>