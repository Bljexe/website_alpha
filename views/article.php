<div id="content">
    <h1>Olá seja bem-vindo ao <?php echo $name; ?>!</h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Novidades do servidor</li>
    </ul>
    <div id="news" class="read">
        <?php
        $newsByPages = 1;
        $page = 1;
        if (isset($_GET['p'])) $page = intval($_GET['p']);

        // Get news count
        $newsCnt = $login_db->query('SELECT COUNT(*) as `cnt` FROM b_news')->fetch()["cnt"];

        setlocale(LC_TIME, 'portuguese', 'pt_BR');
        $request = $login_db->query('SELECT * FROM b_news ORDER BY id ASC LIMIT ' . ($newsByPages * ($page - 2)) . ',' . $newsByPages);
        foreach ($request as $new) {
            $id = '' . $new['id'] . '';
            $title = '' . $new['title'] . '';
            $content = '' . nl2br(stripslashes($new['content'])) . '';
            $author = '' . $new['author'] . '';
            $img = '' . $new['img'] . '';
            $date = '' . ucwords(utf8_encode(strftime("%A %d %B %Y", strtotime($new['date'])))) . '';
            $heure = '' . ucwords(utf8_encode(strftime("%H", strtotime($new['date'])))) . '';
            $minute = '' . ucwords(utf8_encode(strftime("%M", strtotime($new['date'])))) . '';
        ?>
            <title> <?php echo $name; ?> | <?php echo $title ?></title>
            <article>
                <div class="header" style="background-image:url('/template/img/news/<?php echo $img ?>.jpg');">
                    <h2><img src="/template/img/i_news.png" /> <?php echo $title ?></h2>
                </div>
                <p><?php echo $content ?></p>
                <div class="footer">
                    Publicado <?php echo '<strong>' . $date . '</strong> as  <strong>' . $heure . ':' . $minute . '</strong>' ?> por <strong><?php echo $author ?></strong>.
                </div>
            </article>
        <?php
        }
        ?>
        <div class="clear"></div>
    </div>
</div>