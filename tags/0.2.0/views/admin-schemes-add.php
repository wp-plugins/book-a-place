<?php

/*
 * Add New Scheme
 */

$message = '';
$error = '';

if (isset($_POST['submit-scheme'])) {
    if (isset($_POST['scheme-name']) && !empty($_POST['scheme-name']) && isset($_POST['scheme-width']) && !empty($_POST['scheme-width']) && isset($_POST['scheme-height']) && !empty($_POST['scheme-height'])) {
        if ($this->add_scheme($_POST)) {
            $message = 'Scheme has been successfully added.';
        } else {
            $error = 'Error.';
        }
    } else {
        $error = 'All fields are required.';
    }
}

$form_title = 'Add New Scheme';
$submit_button_name = 'Add';

?>




<?php if ($message || $error) : ?>
    <div class="<?php echo ($error) ? 'error' : 'updated' ?>" id="message">
        <p><?php echo $error . $message; ?></p>
    </div>
<?php endif; ?>


<?php require_once(BAP_DIR_PATH . 'views/includes/admin-schemes-form.php'); ?>

