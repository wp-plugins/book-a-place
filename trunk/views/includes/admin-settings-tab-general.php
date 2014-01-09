<form action="" method="post">
    <input type="hidden" name="current-tab" value="0"/>
    <table class="form-table">
        <tbody>

        <tr valign="top">
            <th scope="row"><label for="email"><?php _e("E-mail Address", $this->plugin_slug); ?></label></th>
            <td>
                <input type="text" class="regular-text" value="<?php echo isset($options['email']) ? esc_attr($options['email']) : ''; ?>" id="email" name="email">

                <p class="description"><?php _e("This address is used for admin purposes, like new order notification.", $this->plugin_slug); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row"><label for="email"><?php _e("Cart Expiration Time", $this->plugin_slug); ?></label></th>
            <td>
                <input type="text" class="small-text" value="<?php echo isset($options['cart-expiration-time']) ? esc_attr($options['cart-expiration-time']) : ''; ?>" id="cart-expiration-time" name="cart-expiration-time"> <?php _e("minutes", $this->plugin_slug); ?>
            </td>
        </tr>

        </tbody>
    </table>


    <p class="submit">
        <input type="submit" value="<?php _e("Save Changes", $this->plugin_slug); ?>" class="button button-primary" id="submit" name="submit">
    </p>
</form>