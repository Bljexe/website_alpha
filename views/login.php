<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################
?>
<title><?php echo $name; ?> | Conexão</title>
<div id="content">
<?php
if (!isset($_SESSION['id']))
{
?>
    <h1>Conexão a Conta</h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Conexao</li>
    </ul>
    <div id="middle">
    <h2>Conexão Recusada</h2>
    <p class="alert error"><span class="ico_close"></span> Nome de Usuario ou Senha incorreto, será redirecionado!</p>
    </div>
<?php
}
else
{
?>
    <h1>Conexão a Conta</h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Conexão</li>
    </ul>
    <div id="middle">
    <h2>Conexao Efetuada</h2>
    <p class="alert infos"><span class="ico_info"></span> Voce foi conectado com sucesso, será redirecionado!</p>
    </div>
<?php
}
?>
<?php echo '<meta http-equiv="refresh" content="5;URL=/home">'; ?>
</div>