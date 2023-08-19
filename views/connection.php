<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################
?>
<title> <?php echo $name; ?> | Conexão</title>
<div id="content">
    <h1>Conectar a Pagina</h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Inicia sesión</li>
    </ul>
    <div id="middle">
        <h2>Formulario de conexão</h2>
        <form method="post">
            <label for="">
                <span>*</span> Nome da conta :
                <small>Insira o nome da sua conta.</small>
            </label>
            <input type="text" name="formuser" />
            <label for="">
                <span>*</span> Senha :
                <small>Insira sua senha.</small>
            </label>
            <input type="password" name="formpass" />
            <button style="padding: 15px 90px!important;" name="connection" type="sumbit">Entrar</button>
        </form>
    </div>
</div>