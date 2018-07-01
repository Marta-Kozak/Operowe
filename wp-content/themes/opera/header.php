<!DOCTYPE	html>
<html>
<head>
    <meta	charset="utf-8">
    <title>
        <?php	echo	get_bloginfo('name');	?>
    </title>
    <?php	wp_head();	?>
</head>
<body>

<header class="main-header">

    <div class="container clearfix">

        <header class="header">
            <nav class="page-nav">
                <?php

                wp_nav_menu(['menu_class' => 'navbar-nav']);

                ?>
            </nav>
        </header>
    </div>

    <div class="container clearfix">
        <div class="main-headline">
            <h1>Historia jednej opery</h1>
        </div>
        <div class="description">
            <p>Przedstawiamy opery w aktualnym repertuarze stacji radiowych i polskich teatrów operowych</p>
        </div>
    </div>

</header>