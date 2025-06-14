</main>
<div class="bg">
    <footer role="contentinfo">
        <section class="footer">
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
                <article class="footer__container--links">
                    <h3 class="footer__subtitle">Liens importants</h3>
                    <ul class="list">
                        <?php
                        if (have_rows('important_links', 'option')): ?>
                            <?php while (have_rows('important_links', 'option')): the_row();
                                $link = get_sub_field('link'); ?>
                                <li class="list__item">
                                    <a href="<?= $link['url'] ?>" class="list__link"
                                       title="Vers la page <?= $link['title'] ?>">
                                        <?= $link['title'] ?>
                                    </a>
                                </li>
                            <?php endwhile;
                        endif;
                        ?>
                    </ul>
                </article>
                <article class="footer__container--support">
                    <h3 class="footer__subtitle"><?= __hepl('Nous soutenir') ?></h3>
                    <?php if (have_rows('support', 'option')): ?>
                        <?php while (have_rows('support', 'option')):
                            the_row(); ?>
                            <div class="footer__subcontainer--support">
                                <div class="footer__support__links">
                                    <p>
                                        <?= get_sub_field('support_text') ?>
                                    </p>
                                    <?php $link = get_sub_field('link'); ?>
                                    <?php if (have_rows('support_links', 'option')): ?>
                                    <ul class="footer__list">
                                        <?php while (have_rows('support_links', 'option')): the_row();
                                            $link = get_sub_field('link'); ?>
                                            <li class="list__item">
                                                <a href="<?= $link['url'] ?>" class="button"
                                                   title="Vers la page <?= $link['title'] ?>">
                                                    <?= $link['title'] ?>
                                                </a>
                                            </li>
                                        <?php endwhile;
                                        endif; ?>
                                    </ul>
                                </div>
                                <div class="footer__support__code">
                                    <p>
                                        <?= __hepl('Vous pouvez aussi faire un don fincancier à l’aide de ce QRcode') ?>
                                    </p>
                                    <?= wp_get_attachment_image(get_sub_field('support_code')['id'], 'qrcode', false, ['class' => 'footer__support__code--image']); ?>
                                </div>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </article>
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
        </section>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>