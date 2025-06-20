</main>
<footer id="footer">
    <nav class="footer-menu" aria-label="secondary-navigation">
        <h2 class="screenreader__only"><?= __hepl('Navigation secondaire') ?></h2>
        <ul class="footer-menu__container">

            <li class="footer-menu__title"><?= __hepl('Coordonnées') ?>
                <ul>
                    <li class="footer-menu__item">
                        <a aria-label="Envoyez un mail à cette adresse&nbsp;: <?= get__option('company_email') ?> (nouvelle fenêtre)"
                           href="mailto:<?= get__option('company_email') ?>"
                           itemprop="email"
                           class="footer-menu__link"
                           target="_blank"
                           rel="noopener noreferrer"
                           title="Envoyez un mail à cette adresse: <?= get__option('company_email') ?> (nouvelle fenêtre)"><?= get__option('company_email') ?></a>
                    </li>
                    <li class="footer-menu__item">
                        <a aria-label="Téléphoner à ce numéro de téléphone : <?= get__option('company_phone') ?> (nouvelle fenêtre)"
                           href="tel:+32470548453"
                           itemprop="telephone"
                           class="footer-menu__link"
                           target="_blank"
                           rel="noopener noreferrer"
                           title="Téléphoner à ce numéro de téléphone : <?= get__option('company_phone') ?>. (nouvelle fenêtre)">

                            <?= get__option('company_phone') ?>
                        </a>
                    </li>
                    <li class="footer-menu__item"><?= get__option('company_address') ?></li>
                    <li class="footer-menu__item"><?= get__option('company_postal') ?></li>
                    <li class="footer-menu__item"><?= get__option('company_country') ?></li>
                </ul>
            </li>

            <li class="footer-menu__title"><?= __hepl('Navigation') ?>
                <ul>
                    <?php foreach (get__option('navigation') as $link) : ?>

                        <li class="footer-menu__item">
                            <a class="footer-menu__link"
                               href="<?= esc_url($link['link']['url']) ?>"
                               target="<?= esc_attr($link['link']['target'] ? $link['link']['target'] : '_self') ?>"
                               title="<?= esc_attr($link['link_title']) ?>"><?= esc_html($link['link']['title']) ?></a>
                        </li>

                    <?php endforeach; ?>
                </ul>
            </li>

            <li class="footer-menu__title"><?= __hepl('Ressources utiles') ?>
                <ul>
                    <?php foreach (get__option('resources') as $link) : ?>

                        <li class="footer-menu__item">
                            <a class="footer-menu__link"
                               href="<?= esc_url($link['link']['url']) ?>"
                               target="<?= esc_attr($link['link']['target'] ? $link['link']['target'] : '_self') ?>"
                               title="<?= esc_attr($link['link_title']) ?>"><?= esc_html($link['link']['title']) ?></a>
                        </li>

                    <?php endforeach; ?>
                </ul>
            </li>

            <li class="footer-menu__title"><?= __hepl('Suivez-moi') ?>
                <ul>
                    <?php foreach (get__option('socials') as $link) : ?>

                        <li class="footer-menu__item">
                            <a class="footer-menu__link"
                               href="<?= esc_url($link['link']['url']) ?>"
                               target="<?= esc_attr($link['link']['target'] ? $link['link']['target'] : '_self') ?>"
                               title="<?= esc_attr($link['link_title']) ?>"><?= esc_html($link['link']['title']) ?></a>
                        </li>

                    <?php endforeach; ?>
                </ul>
            </li>

        </ul>
        <div class="footer-menu__legal">
            <p class="footer-menu__legal__copyright">
                <?= '© ' . date('Y') . ' ' . get__option('copyrights') ?>
            </p>
            <a href="<?= esc_url(get__option('legal_notices')['link']['url']) ?>"
               title="<?= esc_attr(get__option('legal_notices')['link']['title']) ?>"
               target="<?= esc_attr(get__option('legal_notices')['link']['target'] ? get__option('legal_notices')['link']['target'] : '_self') ?>"
               class="footer-menu__legal__legal-notices footer-menu__link"><?= esc_html(get__option('legal_notices')['label']) ?></a>
        </div>

    </nav>
</footer>
</div>
</body>
</html>
