<?php

$message = '';
$error = '';

if (isset($_POST['submit-scheme'])) {
    if (isset($_POST['scheme-name']) && !empty($_POST['scheme-name']) && isset($_POST['scheme-width']) && !empty($_POST['scheme-width']) && isset($_POST['scheme-height']) && !empty($_POST['scheme-height']) && isset($_POST['scheme-id']) && !empty($_POST['scheme-id'])) {
        if ($this->update_scheme($_POST) === false) {
            $error = __('Error.', $this->plugin_slug);
        } else {
            $message = __('Scheme has been successfully updated.', $this->plugin_slug);
            // redirect to schemes list
            $redirect_to_page = explode('_page_', $this->schemes_page_screen_hook_suffix);
            wp_redirect(admin_url('admin.php?page=' . $redirect_to_page[1]));
            exit;
        }
    } else {
        $error = __('All fields are required.', $this->plugin_slug);
    }
}

$scheme = $this->get_scheme_by_id($_GET['scheme']);

$form_title = __('Edit Scheme', $this->plugin_slug);
$submit_button_name = __('Edit', $this->plugin_slug);

?>

<?php if ($message || $error) : ?>
    <div class="<?php echo ($error) ? 'error' : 'updated' ?>" id="message">
        <p><?php echo $error . $message; ?></p>
    </div>
<?php endif; ?>

<?php require_once(BAP_DIR_PATH . 'views/includes/admin-schemes-form.php'); ?>
