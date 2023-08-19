<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################
?>
<title><?php echo $name; ?> | Doações</title>

<style>
  /* Estilos para a seleção de valor da doação */
  #donation-amount {
    text-align: center;
    margin-top: 20px;
  }

  #donation-amount label {
    font-size: 18px;
    margin-right: 10px;
    margin-top: 10px;
  }

  #donation-amount input[type="radio"] {
    display: none;
  }

  #donation-amount input[type="radio"]+label {
    display: inline-block;
    padding: 10px 20px;
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    border-radius: 5px;
    cursor: pointer;
  }

  #donation-amount input[type="radio"]:checked+label {
    background-color: #4caf50;
    color: white;
    border-color: #4caf50;
  }

  /* Estilos para a seleção de método de pagamento */
  #payment-methods {
    text-align: center;
    margin-top: 20px;
  }

  #payment-methods select {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  /* Estilos para o botão de enviar doação */
  #submit-button {
    display: flex;
    text-align: center;
    justify-content: center;
    margin-top: 30px;
  }

  #submit-button button {
    padding: 10px 20px;
    font-size: 18px;
    background-color: #4caf50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
</style>

<body>
  <div id="content">
    <?php
    if (!isset($_SESSION['id'])) {
    ?>
      <h1>Doar ao Servidor</h1>
      <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Doações</li>
      </ul>
      <div id="middle">
        <h2>Conexão exigida</h2>
        <p class="alert error"><span class="ico_close"></span> É necessário que você faça login em sua conta primeiro.</p>
      </div>
    <?php
    } else {
    ?>
      <h1>Doar para o Servidor</h1>
      <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Doações</li>
      </ul>
      <div id="middle">
        <?php if (empty($_SESSION['LastConnection'])) { ?>
          <h2>Página em Manutenção</h2>
          <p class="alert infos"><span class="ico_info"></span> Esta página está em manutenção, retornaremos em breve.</p>
        <?php } else { ?>
          <h2>Realize uma doação a <?php echo $name; ?></h2>
          <p class="alert infos"><span class="ico_info"></span> As doações permitirão que você acelere seu progresso e obtenha benefícios cosméticos, no entanto, você pode jogar livremente e progredir sem fazer doações.</p>

          <form action="/process_payment" method="post">
            <div id="donation-amount">
              <label>Escolha o valor da doação:</label>
              <input type="radio" name="amount" value="10" id="amount-10">
              <label for="amount-10">R$10</label>
              <input type="radio" name="amount" value="30" id="amount-30">
              <label for="amount-30">R$30</label>
              <input type="radio" name="amount" value="50" id="amount-50">
              <label for="amount-50">R$50</label>
              <input type="radio" name="amount" value="100" id="amount-100">
              <label for="amount-100">R$100</label>
            </div>

            <div id="payment-methods">
              <label>Escolha o método de pagamento:</label>
              <select name="method_pay">
                <option value="pix">PIX</option>
                <option value="transferencia">Transferência</option>
                <option value="cartao">Cartão de Crédito</option>
                <option value="boleto">Boleto</option>
              </select>
            </div>

            <div id="submit-button">
              <button type="submit">Enviar Doação</button>
            </div>
          </form>
        <?php } ?>
      </div>
    <?php
    }
    ?>
  </div>
</body>