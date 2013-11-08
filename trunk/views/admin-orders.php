<div class="wrap">

    <?php screen_icon('options-general'); ?>
    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>

    <br>

    <?php

    if (isset($_GET['action']) && $_GET['action'] == 'view') {

        require_once(BAP_DIR_PATH . 'views/admin-orders-view.php');

    }  else {

        require_once(BAP_DIR_PATH . 'views/admin-orders-list.php');

    }


    ?>

</div>