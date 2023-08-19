<script src='https://www.google.com/recaptcha/api.js'></script>
<title> <?php echo $name; ?> | Registrar</title>
<div id="content">
    <h1>Criar uma Conta</h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Criar uma Conta</li>
    </ul>
    <div id="middle">
        <h2>Comece a jogar <?php echo $name; ?> !</h2>
        <p>
            <strong>Para começar a jogar no Alpha, o primeiro passo é se cadastrar, e este é o lugar.</strong></br>
            Lembre-se de usar um e-mail válido, caso contrário, em caso de perda de senha ou perda de algum dado, você não poderá recuperá-lo!
        </p>
        <h2>Fique atento aos seus dados</h2>
        <p>
            Em <?php echo $name; ?> os dados da conta são rigorosamente criptografados, protegendo assim a privacidade e a integridade das contas cadastradas.<br>
            Portanto, mesmo a equipe de desenvolvimento não consegue ver sua senha, isso significa que, se você digitar a senha incorretamente, nossa STAFF não poderá fornecê-la.
        </p>
        <h2>Formulario de Registro</h2>
        <?php require('./controllers/register.php'); ?>
        <form method="post">
            <label for="">
                <span>*</span> Nome da Conta :
            </label>
            <input type="text" name="formAccount" />
            <label for="">
                <span>*</span> Senha :
            </label>
            <input type="password" name="formPassword" />
            <label for="">
                <span>*</span> Confirmação :
            </label>
            <input type="password" name="formPasswordConf" />
            <label for="">
                <span>*</span> Apelido :
            </label>
            <input type="text" name="formPseudo" />
            <label for="">
                <span>*</span> Email :
            </label>
            <input type="text" name="formEmail" />
            <label for="">
                <span>*</span> Pergunta secreta :
            </label>
            <input type="text" name="formQuestion" />
            <label for="">
                <span>*</span> Resposta secreta :
            </label>
            <input type="text" name="formReponse" />
            <label for="">
                <div class="g-recaptcha" data-sitekey="6LfSC78ZAAAAAKwLs16o6whFKVkU9ygs3oijWD-G"></div></br>
            </label>
            <button style="padding: 15px 90px!important; background-color:black!important;" name="register_validation" type="sumbit">Registrar-se</button>
        </form>
    </div>
</div>