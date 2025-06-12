<?php /* Template Name: Page "Contact" */ ?>

<?php get_header(); ?>
    <p class="contact__headline"><?= the_title() ?></p>

    <div class="section contact">
        <aside class="info__wrapper">
            <h2 class="info__title"><?= __hepl('Coordonnées') ?></h2>
            <ul>
                <li class="info__item"><a
                            aria-label="Envoyez un mail à cette adresse&nbsp;: <?= get__option('company_email') ?> (nouvelle fenêtre)"
                            href="mailto:<?= get__option('company_email') ?>"
                            itemprop="email"
                            class="info__link"
                            target="_blank"
                            rel="noopener noreferrer"
                            title="Envoyez un mail à cette adresse: <?= get__option('company_email') ?> (nouvelle fenêtre)">
                        <?= get__option('company_email') ?>
                    </a>
                </li>
                <li class="info__item"><a
                            aria-label="Téléphoner à ce numéro de téléphone : <?= get__option('company_phone') ?> (nouvelle fenêtre)"
                            href="tel:+32470548453"
                            itemprop="telephone"
                            class="info__link"
                            target="_blank"
                            rel="noopener noreferrer"
                            title="Téléphoner à ce numéro de téléphone : <?= get__option('company_phone') ?>. (nouvelle fenêtre)">

                        <?= get__option('company_phone') ?>
                    </a>
                </li>
                <li class="info__item"><?= get__option('company_address') ?></li>
                <li class="info__item"><?= get__option('company_postal') ?></li>
                <li class="info__item"><?= get__option('company_country') ?></li>
            </ul>
        </aside>


        <section class="form__wrapper" aria-labelledby="contact-title">

            <h2 id="contact-title" class="screenreader__only"><?= __hepl('Formulaire de contact') ?></h2>

            <?php
            $errors = $_SESSION['contact_form_errors'] ?? [];
            unset($_SESSION['contact_form_errors']);
            $success = $_SESSION['contact_form_success'] ?? false;
            unset($_SESSION['contact_form_success']);

            if ($success): ?>
                <div class="contact__success">
                    <p><?= $success; ?></p>
                </div>
            <?php endif; ?>

            <form action="<?= esc_url(admin_url('admin-post.php')); ?>" method="post" novalidate class="form">

                <fieldset class="form__field">
                    <legend class="screenreader__only"><?= __hepl('Informations de contact') ?></legend>

                    <div>
                        <label for="fullname"><?= __hepl('Nom complet') ?><abbr class="ast" aria-hidden="true"> *</abbr></label>
                        <input
                                type="text"
                                id="fullname"
                                name="fullname"
                                required
                                autocomplete="name"
                                placeholder="<?= __hepl('ex: John Doe') ?>"
                                class="field__input"
                        />
                        <?php if (isset($errors['fullname'])): ?>
                            <p class="field__error"><?= $errors['fullname']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="email"><?= __hepl('Adresse email') ?><abbr class="ast" aria-hidden="true"> *</abbr></label>
                        <input
                                type="email"
                                id="email"
                                name="email"
                                required
                                autocomplete="email"
                                placeholder="<?= __hepl('ex: johndoe@email.com') ?>"
                                class="field__input"
                        />
                        <?php if (isset($errors['email'])): ?>
                            <p class="field__error"><?= $errors['email']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="subject"><?= __hepl('Sujet') ?><abbr class="ast"
                                                                         aria-hidden="true"> *</abbr></label>
                        <input
                                type="text"
                                id="subject"
                                name="subject"
                                required
                                class="field__input"
                        />
                        <?php if (isset($errors['subject'])): ?>
                            <p class="field__error"><?= $errors['subject']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="message"><?= __hepl('Message') ?><abbr class="ast"
                                                                           aria-hidden="true"> *</abbr></label>
                        <textarea
                                id="message"
                                name="message"
                                rows="6"
                                required
                                placeholder="<?= __hepl('Écrivez votre message ici...') ?>"
                                class="field__input"
                        ></textarea>
                    </div>
                    <?php if (isset($errors['message'])): ?>
                        <p class="field__error"><?= $errors['message']; ?></p>
                    <?php endif; ?>
                </fieldset>

                <p class="ast__p"><?= __hepl('Les champs marqués d’un astérisque') ?> (<abbr
                            class="ast">*</abbr>) <?= __hepl('sont obligatoires') ?></p>

                <div class="form__submit">
                    <?php wp_nonce_field('dw_contact_form_action', '_contact_nonce'); ?>
                    <input type="hidden" name="action" value="dw_submit_contact_form">
                    <button type="submit" name="contact_form_submit"
                            class="form__submit--btn"><?= __hepl('Envoyer le message') ?></button>
                </div>
            </form>
        </section>
    </div>

<?php
get_footer();