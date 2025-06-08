</main>
<div class="bg">
    <footer class="footer" role="contentinfo">
        <h2 class="sro">Bas de page</h2>
        <div class="footer__upper">
            <div class="footer__container--branding">
                <div class="footer__brand">
                    <a class="nav__branding" href="<?= home_url() ?>" title="Vers la page d'accueil">Accueil</a>
                    <figure class="nav__figure">
                        <?= wp_get_attachment_image(get_option('options_logo'), 'logo') ?>
                    </figure>
                </div>
                <p class="footer__quote">Aidons ceux dans le besoin</p>
                <ul class="footer__container--social">
                    <?php dw_get_social_links(); ?>
                </ul>
            </div>
            <div class="footer__container--nav">
                <ul>

                </ul>
                <ul>

                </ul>
                <nav class="footer__nav">
                    <h3 class="footer__subtitle">Navigation</h3>
                    <ul class="footer__list list">
                        <?php foreach (dw_get_navigation_links('footer') as $link): ?>
                            <li class="list__item">
                                <a href="<?= $link->href ?>" class="list__link underline"
                                   title="Vers la page <?= $link->label ?>">
                                    <?= $link->label ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="footer__lower juridic">
            <ul class="juridic__container">
                <li class="juridic__item">© 2025 Le vieux moulin SRG. Tous droits réservés.</li>
                <li class="juridic__item">Créé par <a class="juridic__link--creator" target="_blank"
                                                      href="https://tomdebatty.com">Tom Debatty</a></li>
                <li class="juridic__item juridic__legal"><a class="juridic__link underline"
                                                            href="<?= home_url("mentions-legales") ?>">Mentions
                        légales</a></li>
            </ul>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>