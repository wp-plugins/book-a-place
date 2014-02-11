<form action="" method="post">
    <input type="hidden" name="current-tab" value="0"/>
    <table class="form-table">
        <tbody>

        <tr valign="top">
            <th scope="row"><label for="email">E-mail Address</label></th>
            <td>
                <input type="text" class="regular-text" value="<?php echo isset($options['email']) ? esc_attr($options['email']) : ''; ?>" id="email" name="email">

                <p class="description">This address is used for admin purposes, like new order notification.</p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row"><label for="email">Cart Expiration Time</label></th>
            <td>
                <input type="text" class="small-text" value="<?php echo isset($options['cart-expiration-time']) ? esc_attr($options['cart-expiration-time']) : ''; ?>" id="cart-expiration-time" name="cart-expiration-time"> m
            </td>
        </tr>

        </tbody>
    </table>


    <p class="submit">
        <input type="submit" value="Save Changes" class="button button-primary" id="submit" name="submit">
    </p>
</form>