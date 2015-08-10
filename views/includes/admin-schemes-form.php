<?php

if (isset($scheme) && !empty($scheme)) {
    $scheme_id = $scheme->scheme_id;
    $scheme_name = $scheme->name;
    $scheme_width = $scheme->width;
    $scheme_height = $scheme->height;
    $scheme_hidden = $scheme->is_hidden;
    $scheme_description = $scheme->description;
} else {
    $scheme_id = '';
    $scheme_name = '';
    $scheme_width = '';
    $scheme_height = '';
    $scheme_hidden = 0;
    $scheme_description = '';
}

?>

<form action="" method="post">

    <h3 class="title"><?php echo $form_title; ?></h3>
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row"><label for="scheme-name"><?php _e("Name", $this->plugin_slug); ?></label></th>
            <td><input type="text" class="regular-text" id="scheme-name" name="scheme-name" value="<?php echo $scheme_name ? $scheme_name : ''; ?>"></td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="scheme-description"><?php _e("Description", $this->plugin_slug); ?></label></th>
            <td>
                <textarea name="scheme-description" id="scheme-description" cols="50" rows="5"><?php echo esc_textarea($scheme_description); ?></textarea>
                <p class="description"><?php _e("Describe the event: mention the date, time and other important info.", $this->plugin_slug); ?></p>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="scheme-width"><?php _e("Width", $this->plugin_slug); ?></label></th>
            <td><input type="text" class="small-text" id="scheme-width" name="scheme-width" value="<?php echo $scheme_width ? $scheme_width : ''; ?>"> <?php _e("cells horizontally", $this->plugin_slug); ?></td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="scheme-height"><?php _e("Height", $this->plugin_slug); ?></label></th>
            <td><input type="text" class="small-text" id="scheme-height" name="scheme-height" value="<?php echo $scheme_height ? $scheme_height : ''; ?>"> <?php _e("cells vertically", $this->plugin_slug); ?></td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="scheme-hidden"><?php _e("Hide Scheme", $this->plugin_slug); ?></label></th>
            <td>
                <input type="checkbox" id="scheme-hidden" name="scheme-hidden" value="1"<?php echo $scheme_hidden ? ' checked="checked"' : ''; ?>>
                <p class="description">
                    <?php _e("It can be useful, if the scheme is wide and can break your theme layout.", $this->plugin_slug); ?><br>
                </p>
            </td>
        </tr>
        </tbody>
    </table>

    <p class="submit">
        <input type="hidden" name="scheme-id" value="<?php echo $scheme_id ? $scheme_id : ''; ?>" />
        <input type="submit" value="<?php echo $submit_button_name; ?>" class="button button-primary" id="submit-scheme" name="submit-scheme">
    </p>

</form>