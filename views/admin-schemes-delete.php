<?php

$message = '';
$error = '';

if (isset($_GET['scheme']) && !empty($_GET['scheme'])) {

    if ($this->delete_scheme($_GET['scheme'])) {
        $message = 'Scheme has been successfully deleted.';
    }

} else {
    $error = 'Scheme id is not specified.';
}

?>


<!--    Delete Scheme -->


<?php if ($message || $error) : ?>
    <div class="<?php echo ($error) ? 'error' : 'updated' ?>" id="message"><p><?php echo $error . $message; ?></p>
    </div>
<?php endif; ?>

<!--    End Delete Scheme -->