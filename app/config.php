<?php

//Nome do Servidor
$name = 'Symp';

//Numero de Noticias na Pagina
$news = '4';
//Inscrição limitada por IP
$OneIP = false;

//Link do Servidor
$vote = '';
$shop = '';
$mega = '#';
$drive = '#';
$mediafire = '#';
$mac = '#';
$forum = '';
$discord = 'https://discord.gg/DQ89Bfex';
$twitter = '#';
$facebook = 'https://www.facebook.com/sympserversuporte';


// Jogadores Online $max
$query = $login_db->query('SELECT CharsCount FROM worlds');
$max_row = $query->fetch(PDO::FETCH_ASSOC);
$max = $max_row['CharsCount'];
$trucho = ($max);


//Vote
$pts_vote = 0;
