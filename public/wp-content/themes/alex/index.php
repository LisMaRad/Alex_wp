<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.5" />

    <title>Alex Mayer</title>

    <script type="module">
        document.documentElement.classList.remove('no-js'); document.documentElement.classList.add('js')
    </script>
    <script src="js/script.js"></script>

    <link rel="stylesheet" href="sass/style.css" />
    <link href="dist/hamburgers.css" rel="stylesheet">

    <meta name="description"
        content="Sie wollen eine neue Website, dann sind Sie hier genau richtig. Alex Mayr designed Ihre Homepage" />
    <meta property="og:title" content="Alex Mayer - Webdesign" />
    <meta property="og:description"
        content="Sie wollen eine neue Website, dann sind Sie hier genau richtig. Alex Mayr designed Ihre Homepage" />
    <meta property="og:image" content="https://www.alexmayer.com/assets/logo.png" />
    <meta property="og:image:alt" content="Logo von Alex Mayer" />
    <meta property="og:locale" content="de_AT" />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary" />
    <meta property="og:url" content="https://www.alexmayer.com" />
    <link rel="canonical" href="https://www.alexmayer.com" />

    <link rel="icon" href="assets/favicon.ico" />
    <link rel="icon" href="assets/favicon.svg" type="image/svg+xml" />
    <link rel="apple-touch-icon" href="assets/apple-touch-icon.png" />
    <link rel="manifest" href="assets/my.webmanifest" />
    <link href="../node_modules/hamburgers/dist/hamburgers.css" rel="stylesheet">
    <meta name="theme-color" content="#009ee3" />
    <?php wp_head(); ?>
</head>

<body>
    <?php wp_body_open(); ?>
    <header>
        <h1 id="logo">Alex Mayer</h1>
        <button id="hamburger" class="hamburger--squeeze" type="button" onclick="Toggle()">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
        <nav>
            <?php wp_nav_menu(array ('theme_location' => 'main-menu')); ?>
        </nav>

    </header>

    <?php if (is_front_page()){ ?>
        <section id="hero">
        <div id="heroText">
            <h2>
                <span>Glänzende Ideen für leuchtende Augen</span>
            </h2>
            <button>Angebot einholen</button>
        </div>
        <?php }
        else{ ?>
        <section id="thumbnail">
        <?php the_post_thumbnail(); ?>
    </section>
       <?php } ?>
    
        </section>



    <main>
        <section id="maincontents" class="max-width-container">
    <?php
        if ( have_posts() ){
            while ( have_posts() ){
                the_post();
                the_content();
            }
        }
        else{
            echo "<p>Derzeit nocht keine Beiträge... Bitte komm später wieder zurück!</p>";
        }
    ?>
    </section>


        <?php if (is_front_page()) { ?>
    <section class="max-width-container" id="services">
            <h2>Leistungen</h2>
            <ul>
            <?php

$services_query = new WP_Query('order=DESC&&cat=3');	
if($services_query->have_posts()) : 
while($services_query->have_posts()) : $services_query->the_post(); ?>
<li>
    <a href="<?php the_permalink(); ?>">
    <span><?php the_title(); ?></span>
    <?php the_post_thumbnail(); ?>
    </a>
</li> 									
<?php endwhile;	
else : ?>
    <p>Erster Post demnächst...</p>
<?php endif;		
wp_reset_postdata();?>
            </ul>
        </section>

        <section class="max-width-container" id="news">
            <h2>News</h2>
            <ul>
                <?php
$news_query = new WP_Query('order=DESC&&cat=2');	
if($news_query->have_posts()) : 
while($news_query->have_posts()) : $news_query->the_post(); ?>
<li>
    <a href="<?php the_permalink(); ?>">
    <?php the_title(); ?>
    </a>
    <?php the_content(); ?>
    <a href="<?php the_permalink(); ?>">[mehr erfahren]</a>
</li> 									
<?php endwhile;	
else : ?>
    <p>Erster Post demnächst...</p>
<?php endif;		
wp_reset_postdata();?>
            </ul>
        </article>
        </section>

        <section class="max-width-container" id="clients">
            <h2>Referenzen</h2>
            <div class="grid">
            <?php
            $clients_query = new WP_Query('order=ASC&&cat=4&&posts_per_page=3');
                if($clients_query->have_posts()) :
                    while ($clients_query->have_posts()) : $clients_query->the_post();
                    $blockquote = get_field( "zitat" );
                    $role = get_field( "role" );
                    ?>
                    
                    <article>
                    <?php the_post_thumbnail(); ?>
                    <span class="info">
                    <cite><?php the_title();?></cite>
                    <p><?php echo $role?></p>
                    </span>
                    <blockquote><?php echo $blockquote?></blockquote>
                    </article>
                    <?php endwhile;
                    else : ?>
                    <article>Noch keine Referenzen vorhanden</article>
                    <?php endif;
                    wp_reset_postdata(); ?>
                        
                        
                    <article class="quotes">
                    <img src="<?= get_template_directory_uri() . '/images/quotation_mark.svg' ?>" alt="Zitatzeichen" />
                    </article> 
                    </div>
        </section>
        <?php } ?> <!--is_front_page-->
        </main>
    <footer>
        <h3 id="copyright">© Alex Mayer 2020</h3>
        <nav>
            <ul>
                <li>
                    <a href="#">Impressum</a>
                </li>
                <li> | </li>
                <li>
                    <a href="#">Datenschutzerklärung</a>
                </li>
            </ul>
        </nav>
        <h3 id="creators">Demo-Wordpress-Seite im Rahmen der LV ‚Content Mangagement Systeme‘ an der FH Salzburg von
            Vanessa Reiter und Lisa Rader</h3>
        <h3>Alle Inhalte frei erfunden</h3>
        <h3>Bildnachweis</h3>
        <h3 class="noMarginBottom">Fotos</h3>
        <ul class="noMarginTop">
            <li>Herofoto Tastatur: Aman Anderson, http://de.freeimages.com/photo/illuminated-keyboard-124228</li>
            <li>Foto Dina Meyer by Dreifachaxel [CC BY-SA 4.0 (https://creativecommons.org/licenses/by-sa/4.0)], from
                Wikimedia
                Commons</li>
            <li>Foto Thomas Meyer-Hermann By Thomas Meyer-Hermann (Thomas Meyer-Hermann) [GFDL
                (http://www.gnu.org/copyleft/fdl.html), CC BY-SA 3.0 (https://creativecommons.org/licenses/by-sa/3.0) or
                CC BY-SA 3.0 de
                (https://creati- vecommons.org/licenses/by-sa/3.0/de/deed.en)], via Wikimedia Commons
                https://upload.wikimedia.org/wikipedia/commons/thumb/c/c6/Thomas_Meyer-Hermann_1.jpg/407px-Thomas_Meyer-Hermann_1.jpg
            </li>
            <li>Foto Vorstand Sparkasse Ülzen [[File:SKUelzen Vorstand 2015.jpg|SKUelzen Vorstand 2015]]
                https://upload.wikimedia.org/wikipedia/commons/3/3e/SKUelzen_Vorstand_2015.jpg
            </li>
        </ul>
        <h3 class="noMarginBottom">Icons</h3>
        <p class="noMarginTop">Freepik (http://www.freepik.com) / www.flaticon.com</p>

    </footer>
<?php wp_footer(); ?>
</body>

</html>