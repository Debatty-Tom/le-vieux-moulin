<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= wp_title('·', false, 'right') . get_bloginfo('name') ?></title>
    <link rel="stylesheet" type="text/css" href="<?= dw_asset('css'); ?>">
    <script src="<?= dw_asset('js') ?>" defer></script>
    <?php wp_head(); ?>
</head>
<body>
<h1 class="sro"><?= get_the_title() ?></h1>
<header class="header" role="banner">
    <nav class="nav">
        <h2 class="sro"><?= __hepl('Navigation principale') ?></h2>
        <div class="nav__brand">
            <a class="nav__branding" href="<?= home_url() ?>" title="Vers la page d'accueil"><span
                        itemprop="name">Le vieux moulin</span></a>
            <?= wp_get_attachment_image(get_option('options_logo'), 'logo') ?>
        </div>
        <label class="sro" for="burger">Burger menu</label>
        <input type="checkbox" name="burger" id="burger">
        <div class="burger__wrapper">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="nav__container">
            <?php
            $houses_links = [];
            $other_links = [];

            foreach (dw_get_navigation_links('header') as $link) {
                if (str_contains($link->href, 'maisons/')) {
                    $houses_links[] = $link;
                } else {
                    $other_links[] = $link;
                }
            }

            // Afficher les autres liens normalement
            foreach ($other_links as $link):
                if ( str_contains($link->href, 'don/')): ?>
                    <li class="nav__items nav__items--support">
                        <a href="<?= $link->href ?>" class="nav__link nav__link--support button"
                           title="Vers la page <?= $link->label ?>"><?= $link->label?></a>
                    </li>
                <?php else: ?>
                    <li class="nav__items">
                        <a href="<?= $link->href ?>"
                           class="nav__link"
                           title="Vers la page <?= $link->label ?>"><?= $link->label ?></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>

            <?php
            if (!empty($houses_links)): ?>
                <li class="nav__items nav__items--dropdown">
                    <a href="#" class="nav__link nav__link--dropdown" title="Nos maisons">
                        <?= __hepl('Nos Maisons') ?>
                    </a>

                    <ul class="nav__dropdown">
                        <?php foreach ($houses_links as $maison_link): ?>
                            <li class="nav__dropdown-item">
                                <a href="<?= $maison_link->href ?>"
                                   class="nav__dropdown-link"
                                   title="Vers <?= $maison_link->label ?>">
                                    <?= $maison_link->label ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<main>