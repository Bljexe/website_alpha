<?php

echo '<pre> RECEBI O ARRAY';
print_r($_POST);
echo '</pre>';
exit;


// SDK do Mercado Pago
require __DIR__ .  '/vendor/autoload.php';
// Adicione as credenciais
MercadoPago\SDK::setAccessToken('APP_USR-6834350115957158-081910-6b1eef13db76f3162cc94eed8370e32a-58757528');

$preference = new MercadoPago\Preference();

// Cria um item na preferência
$item = new MercadoPago\Item();
$item->title = 'Meu produto';
$item->quantity = 1;
$item->unit_price = 75.56;
$preference->items = array($item);

// o $preference->purpose = 'wallet_purchase'; permite apenas pagamentos logados
// para permitir pagamentos como guest, você pode omitir essa propriedade
$preference->purpose = 'wallet_purchase';
$preference->save();
