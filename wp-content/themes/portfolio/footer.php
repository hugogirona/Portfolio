</main>
<footer id="footer">
    <nav class="footer-menu">
        <h2 class="screenreader__only"><?= __hepl('Navigation secondaire') ?></h2>
        <ul class="footer-menu__container">

            <li class="footer-menu__title"><?= __hepl('Coordonnées') ?>
                <ul>
                    <li class="footer-menu__item"><?= get__option('company_email') ?></li>
                    <li class="footer-menu__item"><?= get__option('company_phone') ?></li>
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
                               target="<?= esc_attr($link['link']['target']) ?>"
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
                               target="<?= esc_attr($link['link']['target']) ?>"
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
                               target="<?= esc_attr($link['link']['target']) ?>"
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
            <a href="<?= get__option('legal_notices')['link']['url'] ?>"
               title="<?= get__option('legal_notices')['link']['title'] ?>"
               target="<?= get__option('legal_notices')['link']['target'] ?>"
               class="footer-menu__legal__legal-notices footer-menu__link"><?= get__option('legal_notices')['label'] ?></a>
        </div>


</footer>
</div>
</body>
</html>
