<?php
include('./controllers/ladders.php');
?>
<title> <?php echo $name; ?> | Guild</title>
<div id="content">
    <h1>Ranking Guild de <?php echo $name; ?></h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Ranking Guild de <?php echo $name; ?></li>
    </ul>
    <div id="middle">
        <h2>As 100 guilds mais poderosas de <?php echo $name; ?></h2>
        <table class="ladder">
            <thead>
                <tr>
                    <th width="50px" class="c">#</th>
                    <th class="l">Nome da Guild</th>
                    <th width="50px" class="c">Nivel</th>
                    <th width="150px" class="r">Experiencia</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $request = $game_db->query('SELECT Name,Experience FROM guilds ORDER BY Experience DESC LIMIT 0,100');
                $pos = 1;
                foreach ($request as $guilds) {
                    echo '<tr>';
                    echo '<td class="c"><span class="rang">' . $pos . '</span></td>';
                    echo '<td class="l">' . htmlentities($guilds['Name']) . '</td>';
                    echo '<td class="c"><b>' . get_level_by_guilde(htmlentities($guilds['Experience'])) . '</b></td>';
                    echo '<td class="r">' . htmlentities($guilds['Experience']) . '</td>';
                    echo '</tr>';
                    $pos++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>