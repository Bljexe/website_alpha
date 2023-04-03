<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################
?>
<title>Dofus <?php echo $name; ?> | Doações</title>
<div id="content">
<?php
if (!isset($_SESSION['id']))
{
?>
    <h1>Doar ao Servidor</h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Doações</li>
    </ul>
    <div id="middle">
    <h2>Conexão exigida</h2>
    <p class="alert error"><span class="ico_close"></span> Es necesario que ingreses a tu cuenta primero.</p>
    </div>
<?php
}
else
{
?>
    <h1>Doar para o Servidor</h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Doações</li>
    </ul>
    <div id="middle">
    <?php if (empty($_SESSION['LastConnection'])) { ?>
    <h2>Pagina em Manutenção</h2>
    <p class="alert infos"><span class="ico_info"></span> Está página está em manutenção, retornaremos em breve.</p>
    <?php } else { ?>
    <h2>Realiza uma doação a Dofus <?php echo $name; ?></h2>
    <p class="alert infos"><span class="ico_info"></span> As doações permitirão que você acelere seu progresso e obtenha benefícios cosméticos, no entanto, você pode jogar livremente e progredir sem fazer doações.</p>
    
<center>
    <h2 style="text-align: center;">Compre suas Ogrinas agora mesmo!</h2>
    <br>
<div style="width: 300px; padding: 20px; background-color: #f2f2f2; border: 1px solid #ccc; border-radius: 5px;">
  <h3>Sua conta é: <b><?php echo ''.$_SESSION['Login'].''; ?></b></h3>
  <p>Ao efetuar o pagamento, entre em contato com nossa <b>STAFF</b> para confirmar seu pagamento.</p>
  <form name="pg_frm" method="post" action="https://suaurl.com/pagamento.php">
    <input type="hidden" name="quantidade" value="2000">
    <input type="hidden" name="preco" value="6">
    <input type="hidden" name="usuario" value="<?php echo ''.$_SESSION['Login'].''; ?>">
    <input type="submit" value="1000 Ogrinas por R$10.00">
  </form>
  <form name="pg_frm" method="post" action="https://suaurl.com/pagamento.php">
    <input type="hidden" name="quantidade" value="2000">
    <input type="hidden" name="preco" value="6">
    <input type="hidden" name="usuario" value="<?php echo ''.$_SESSION['Login'].''; ?>">
    <input type="submit" value="2000 Ogrinas por R$20.00">
  </form>
  <form name="pg_frm" method="post" action="https://suaurl.com/pagamento.php">
    <input type="hidden" name="quantidade" value="2000">
    <input type="hidden" name="preco" value="6">
    <input type="hidden" name="usuario" value="<?php echo ''.$_SESSION['Login'].''; ?>">
    <input type="submit" value="3000 Ogrinas por R$30.00">
  </form>
</div>

    <!--

<p><strong>Lembre-se:</strong> Tenha sua conta desconectada dentro do jogo ao efetuar o pagamento. As Ogrinas serão creditadas na conta que você inseriu: <strong><?php echo ''.$_SESSION['Login'].''; ?></strong></p>

<form name="pg_frm" method="post" action="https://www.paygol.com/pay">
<input type="hidden" name="pg_serviceid" value="478816">
<input type="hidden" name="pg_currency" value="USD">
<input type="hidden" name="pg_name" value="80000">
<input type="hidden" name="pg_custom" value="<?php echo ''.$_SESSION['Login'].''; ?>">
<input type="hidden" name="pg_price" value="200">
<input type="hidden" name="pg_return_url" value="https://alphaserver.com.br/pago_exitoso.php">
<input type="hidden" name="pg_cancel_url" value="https://alphaserver.com.br/pago_fallido.php">
<input type="submit" value="160000 Ogrinas - $200.00 USD">
</form>
<img alt="" border="0" src="https://i.imgur.com/llQckVB.png" width="235" height="184">
-->
</center>
    <?php } ?>
    </div>
<?php
}
?>
</div>