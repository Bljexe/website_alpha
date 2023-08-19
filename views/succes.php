<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################
?>
<title> <?php echo $name; ?> | Desconectar</title>
<div id="content">
    <?php
    if (!isset($_SESSION['id'])) {
    ?>
        <h1>Desconectar da Conta</h1>
        <ul id="breadcrump">
            <li><a href="/home">Inicio</a></li>
            <li>Desconectar</li>
        </ul>
        <div id="middle">
            <h2>Voce foi desconectado</h2>
            <p class="alert valid"><span class="ico_check"></span> Desconectado com sucesso, será redirecionado.</p>
        </div>
    <?php
    } else {
    ?>
        <h1>Desconectar da Conta</h1>
        <ul id="breadcrump">
            <li><a href="/home">Inicio</a></li>
            <li>Desconectar</li>
        </ul>
        <div id="middle">
            <h2>Desconexão negada</h2>
            <p class="alert infos"><span class="ico_info"></span> Desconexão negada, será redirecionado.</p>
        </div>
    <?php
    }
    ?>
    <?php echo '<meta http-equiv="refresh" content="5;URL=/home">'; ?>
</div>