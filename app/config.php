<?php

//Nome do Servidor
$name = 'Alpha';

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
$discord = 'https://discord.gg/2K8QugjC';
$twitter = '#';
$facebook = '#';


// Jogadores Online $max
$query = $login_db->query('SELECT CharsCount FROM worlds');
$max_row = $query->fetch(PDO::FETCH_ASSOC);
$max = $max_row['CharsCount'];
$trucho = ($max + 21);


//Vote
$pts_vote = 0;
?>