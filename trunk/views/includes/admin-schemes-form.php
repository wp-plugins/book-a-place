<?php

if (isset($scheme) && !empty($scheme)) {
    $scheme_id = $scheme->scheme_id;
    $scheme_name = $scheme->name;
    $scheme_width = $scheme->width;
    $scheme_height = $scheme->height;
    $scheme_description = $scheme->description;
} else {
    $scheme_id = '';
    $scheme_name = '';
    $scheme_width = '';
    $scheme_height = '';
    $scheme_description = '';
}

?>

<form action="" method="post">

    <h3 class="title"><?php echo $form_title; ?></h3>
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row"><label for="scheme-name">Name</label></th>
            <td><input type="text" class="regular-text" id="scheme-name" name="scheme-name" value="<?php echo $scheme_name ? $scheme_name : ''; ?>"></td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="scheme-description">Description</label></th>
            <td>
                <textarea name="scheme-description" id="scheme-description" cols="50" rows="5"><?php echo esc_textarea($scheme_description); ?></textarea>
                <p class="description">Describe the event: mention the date, time and other important info.</p>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="scheme-width">Width</label></th>
            <td><input type="text" class="small-text" id="scheme-width" name="scheme-width" value="<?php echo $scheme_width ? $scheme_width : ''; ?>"> cells horizontally</td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="scheme-height">Height</label></th>
            <td><input type="text" class="small-text" id="scheme-height" name="scheme-height" value="<?php echo $scheme_height ? $scheme_height : ''; ?>"> cells vertically</td>
        </tr>
        </tbody>
    </table>

    <p class="submit">
        <input type="hidden" name="scheme-id" value="<?php echo $scheme_id ? $scheme_id : ''; ?>" />
        <input type="submit" value="<?php echo $submit_button_name; ?>" class="button button-primary" id="submit-scheme" name="submit-scheme">
    </p>

</form>