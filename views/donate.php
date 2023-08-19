<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################
?>
<title> <?php echo $name; ?> | Doações</title>
<style>
  #form-checkout {
    display: flex;
    flex-direction: column;
    max-width: 600px;
  }

  .container {
    height: 18px;
    display: inline-block;
    border: 1px solid rgb(118, 118, 118);
    border-radius: 2px;
    padding: 1px 2px;
  }

  .currency-option {
    display: inline-block;
    background-color: #fff;
    border: 2px solid #ccc;
    border-radius: 8px;
    padding: 10px;
    cursor: pointer;
    transition: border-color 0.3s, transform 0.3s;
    text-align: center;
    margin: 5px;
    margin-bottom: 20px;
  }

  .currency-option:hover {
    border-color: #007bff;
    transform: scale(1.05);
  }

  .currency-option.selected {
    border-color: #007bff;
  }

  .currency-symbol {
    font-size: 24px;
  }

  input[type="radio"] {
    display: none;
  }
</style>

<body>
  <script src="https://sdk.mercadopago.com/js/v2"></script>
  <script>
    const mp = new MercadoPago('APP_USR-63ecfd3e-ab29-4922-9a8b-cfb602721425');
    const bricksBuilder = mp.bricks();
    const renderPaymentBrick = async (bricksBuilder) => {
      const settings = {

        initialization: {
          /*
            "amount" é a quantia total a pagar por todos os meios de pagamento com exceção da Conta Mercado Pago e Parcelas sem cartão de crédito, que têm seus valores de processamento determinados no backend através do "preferenceId"
          */
          amount: 1000,
          preferenceId: "<PREFERENCE_ID>",
          payer: {
            firstName: "",
            lastName: "",
            email: "",
          },
        },
        customization: {
          visual: {
            style: {
              theme: "dark",
            },
          },
          paymentMethods: {
            creditCard: "all",
            debitCard: "all",
            ticket: "all",
            bankTransfer: "all",
            atm: "all",
            onboarding_credits: "all",
            wallet_purchase: "all",
            maxInstallments: 1
          },
        },
        callbacks: {
          onReady: () => {
            /*
             Callback chamado quando o Brick está pronto.
             Aqui, você pode ocultar seu site, por exemplo.
            */
          },
          onSubmit: ({
            selectedPaymentMethod,
            formData,
            selectedValue
          }) => {
            // callback chamado quando há click no botão de envio de dados
            return new Promise((resolve, reject) => {
              fetch("/process_payment", {
                  method: "POST",
                  headers: {
                    "Content-Type": "application/json",
                  },
                  body: JSON.stringify(selectedPaymentMethod),
                })
                .then((response) => response.json())
                .then((response) => {
                  console.log(response)
                  resolve();
                })
                .catch((error) => {
                  // manejar a resposta de erro ao tentar criar um pagamento
                  reject();
                });
            });
          },
          onError: (error) => {
            // callback chamado para todos os casos de erro do Brick
            console.error(error);
          },
        },
      };
      window.paymentBrickController = await bricksBuilder.create(
        "payment",
        "paymentBrick_container",
        settings
      );
    };
    renderPaymentBrick(bricksBuilder);

    document.addEventListener("DOMContentLoaded", function() {
      const currencyOptions = document.querySelectorAll('.currency-option input');

      currencyOptions.forEach(option => {
        option.addEventListener('change', (event) => {
          const selectedValue = event.target.value;
          console.log(`Valor selecionado: R$${selectedValue}`);

          // Aqui você pode enviar o valor para o Mercado Pago ou fazer qualquer outra ação desejada.
        });
      });
    });
  </script>


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
        <p class="alert error"><span class="ico_close"></span> Es necesario que ingreses a tu cuenta primero.</p>
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
          <h2>Pagina em Manutenção</h2>
          <p class="alert infos"><span class="ico_info"></span> Está página está em manutenção, retornaremos em breve.</p>
        <?php } else { ?>
          <h2>Realiza uma doação a <?php echo $name; ?></h2>
          <p class="alert infos"><span class="ico_info"></span> As doações permitirão que você acelere seu progresso e obtenha benefícios cosméticos, no entanto, você pode jogar livremente e progredir sem fazer doações.</p>

          <center>
            <h2 style="text-align: center;">Compre suas Ogrinas agora mesmo!</h2>
            <br>
            <div style="width: 700px; padding: 20px; background-color: #f2f2f2; border: 1px solid #ccc; border-radius: 5px;">
              <div>
                <label class="currency-option">
                  <input type="radio" name="currency" value="10" />
                  <span class="currency-symbol">R$</span> 10
                </label>
                <label class="currency-option">
                  <input type="radio" name="currency" value="30" />
                  <span class="currency-symbol">R$</span> 30
                </label>
                <label class="currency-option">
                  <input type="radio" name="currency" value="50" />
                  <span class="currency-symbol">R$</span> 50
                </label>
                <label class="currency-option">
                  <input type="radio" name="currency" value="100" />
                  <span class="currency-symbol">R$</span> 100
                </label>
              </div>
              <div id="paymentBrick_container"></div>
            </div>
          </center>
        <?php } ?>
      </div>
    <?php
    }
    ?>
  </div>
</body>