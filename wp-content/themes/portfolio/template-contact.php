<?php /* Template Name: Page "Contact" */ ?>

<?php get_header(); ?>
    <p class="contact_headline"><?= the_title() ?></p>
    <aside class="aside contact__left">
        <h2 class="info__title"><?= __hepl('Coordonnées') ?></h2>
        <ul>
            <li class="info__item"><?= get__option('company_email') ?></li>
            <li class="info__item"><?= get__option('company_phone') ?></li>
            <li class="info__item"><?= get__option('company_address') ?></li>
            <li class="info__item"><?= get__option('company_postal') ?></li>
            <li class="info__item"><?= get__option('company_country') ?></li>
        </ul>
    </aside>


    <section class="contact__right" aria-labelledby="contact-title">

    <h2 id="contact-title"><?= __hepl('Formulaire de contact')?></h2>

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

    <form action="" method="post" novalidate class="from">
        <fieldset class="form__field">
            <legend class="visually-hidden"><?=__hepl('Informations de contact')?></legend>

            <div>
                <label for="fullname"><?=__hepl('Nom complet')?><span class="ast" aria-hidden="true">*</span></label>
                <input
                        type="text"
                        id="fullname"
                        name="fullname"
                        required
                        autocomplete="name"
                        placeholder="<?=__hepl('ex: John Doe')?>"
                        class="field__input"
                />
                <?php if(isset($errors['fullname'])): ?>
                    <p class="field__error"><?= $errors['fullname']; ?></p>
                <?php endif; ?>
            </div>

            <div>
                <label for="email"><?=__hepl('Adresse email')?><span class="ast" aria-hidden="true">*</span></label>
                <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        autocomplete="email"
                        placeholder="<?=__hepl('ex: johndoe@email.com')?>"
                        class="field__input"
                />
                <?php if(isset($errors['email'])): ?>
                    <p class="field__error"><?= $errors['email']; ?></p>
                <?php endif; ?>
            </div>

            <div>
                <label for="subject"><?=__hepl('Sujet')?><span class="ast" aria-hidden="true">*</span></label>
                <input
                        type="text"
                        id="subject"
                        name="subject"
                        required
                        placeholder="<?=__hepl('Un projet, une demande d’information ?')?>"
                        class="field__input"
                />
                <?php if(isset($errors['subject'])): ?>
                    <p class="field__error"><?= $errors['subject']; ?></p>
                <?php endif; ?>
            </div>

            <div>
                <label for="message"><?=__hepl('Message')?><span class="ast" aria-hidden="true">*</span></label>
                <textarea
                        id="message"
                        name="message"
                        rows="6"
                        required
                        placeholder="<?=__hepl('Écrivez votre message ici')?>"
                        class="field__input"
                ></textarea>
            </div>
            <?php if(isset($errors['message'])): ?>
                <p class="field__error"><?= $errors['message']; ?></p>
            <?php endif; ?>
        </fieldset>

        <p class="ast__p"><?=__hepl('Les champs marqués d’un astérisque')?> (<span class="ast">*</span>) <?=__hepl('sont obligatoires')?></p>

        <div class="form__submit">
            <input type="hidden" name="action" value="dw_submit_contact_form">
            <button type="submit" name="contact_form_submit" class="btn"><?=__hepl('Envoyer le message')?></button>
        </div>
    </form>
    </section>


    <?php
    get_footer();