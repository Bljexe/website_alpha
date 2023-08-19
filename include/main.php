<?php
include('./controllers/connect.php');
?>
<header>
	<div class="ct">
		<a id="logotype" href="/home">
			<?php echo $name; ?>
			<small>Servidor de 2.51</small>
		</a>
		<nav>

			<ul class="nav">
				<li><a href="/home">Inicio <span class="ico_home"></span></a></li>
				<li class="sub">Jogar<span class="ico_caret-down"></span>
					<ul class="submenu">
						<li><a href="/register">Criar uma Conta</a></li>
						<li><a href="/join">Download</a></li>
					</ul>
				</li>
				<li class="sub">Ranking <span class="ico_caret-down"></span>
					<ul class="submenu">
						<li><a href="/ladders/pvm">PvM</a></li>
						<li><a href="/ladders/pvp">Honor</a></li>
						<li><a href="/ladders/guilde">Guild</a></li>
						<li><a href="/ladders/kolizeum1v1">Koliseu 1vs1</a></li>
						<li><a href="/ladders/kolizeum3v3">Koliseu 3vs3 Equipe</a></li>
						<li><a href="/ladders/kolizeum3v3solo">Koliseu 3vs3 Solo</a></li>
					</ul>
				</li>
				<li class="logotype"></li>
				<li class="sub">Comunidade <span class="ico_caret-down"></span>
					<ul class="submenu">
						<li><a href="<?php echo $discord; ?>">Discord</a></li>
						<!-- <li><a href="<?php echo $forum; ?>">Foro</a></li>
						<li><a href="<?php echo $twitter; ?>">Twitter</a></li> -->
						<li><a href="<?php echo $facebook; ?>">Facebook</a></li>
					</ul>
				</li>
				<li class="sub">Doações <span class="ico_caret-down"></span>
					<ul class="submenu">
						<!--<li><a href="/vote">Vote & gagne</a></li>-->
						<li><a href="/donate">Doações</a></li>
					</ul>
				</li>
				<?php if (isset($_SESSION['id'])) {
					$aInfo = $login_db->prepare("SELECT * FROM accounts WHERE Id = ?");
					$aInfo->execute(array($_SESSION['id']));
					$rowcPseudo = $aInfo->rowCount();
					if ($rowcPseudo == 1) {
						$info = $aInfo->fetch();
						$_SESSION['Id'] = $info['Id'];
						$_SESSION['Login'] = $info['Login'];
						$_SESSION['Nickname'] = $info['Nickname'];
						$_SESSION['UserGroupId'] = $info['UserGroupId'];
						$_SESSION['SecretQuestion'] = $info['SecretQuestion'];
						$_SESSION['SecretAnswer'] = $info['SecretAnswer'];
						$_SESSION['Email'] = $info['Email'];
						$_SESSION['LastConnection'] = $info['LastConnection'];
						$_SESSION['LastConnectedIp'] = $info['LastConnectedIp'];
						$_SESSION['Ogrinas'] = $info['Ogrinas'];
					}
					if (!empty($_SESSION['LastConnection'])) {
						$aInfot = $game_db->prepare("SELECT * FROM accounts WHERE Id = ?");
						$aInfot->execute(array($_SESSION['id']));
						$rowcPseudot = $aInfot->rowCount();
						if ($rowcPseudot == 1) {
							$infot = $aInfot->fetch();
							$_SESSION['Tokens'] = $infot['Tokens'];
							$_SESSION['Id'] = $infot['Id'];
							$_SESSION['NewTokens'] = $infot['NewTokens'];
						}
					}
				?>
					<li class="sub">Minha Conta <span class="ico_caret-down"></span>
						<ul class="submenu">
							<li><a href="/account">Gestão de Conta</a></li>
							<li><a>Meus pontos : <?php echo '' . $_SESSION['Ogrinas'] . ''; ?></a></li>
							<li><a href="/logout">Desconectar</a></li>
						</ul>
					</li>
		</nav>
	<?php } else { ?>
		</nav>
		<div class="panel">
			<a data-nav="no" class="link menu">
				<div class="ico_navicon"></div>
			</a>
			<a href="#LoginWnd" rel="modal:open" class="link" title="Conectar a uma conta">
				<div class="ico_lock"></div>
			</a>
			<a href="/register" class="link" title="Registrar-se">
				<div class="ico_user-plus"></div>
			</a>
		</div>
	<?php } ?>

	</div>
</header>
<div id="LoginWnd" class="modal">
	<h1>
		<div class="ico_lock"></div> Conectar-se
	</h1>
	<ul id="breadcrump">
		<li>Inicia sessão em sua conta <strong> <?php echo $name; ?></strong> !</li>
	</ul>
	<div id="middle">
		<form method="post">
			<center><label for="formuser">
					<span>*</span> Nome da Conta :
					<small>Insira o nome da sua conta.</small>
				</label>
				<input type="text" name="formuser" value="">
				<label for="formpass">
					<span>*</span> Senha :
					<small>Insira sua Senha.</small>
				</label>
				<input type="password" name="formpass" value="">
				<button name="connection" type="sumbit">Conectar-se</button>
			</center>
		</form>
	</div>
</div>
<div class="ct">
	<main>