<?php

$message = '';
$error = '';
if (isset($_POST['submit']) && $_POST['submit'] == 'Save Changes') {
    if ($this->update_order($_GET['order']) === false) {
        $error = 'Error.';
    } else {
        $message = 'Order has been successfully updated.';
    }
}

$order = $this->get_order_by_id($_GET['order']);
$places = unserialize($order->places);

?>

<?php if ($message || $error) : ?>
    <div class="<?php echo ($error) ? 'error' : 'updated' ?>" id="message">
        <p><?php echo $error . $message; ?></p>
    </div>
<?php endif; ?>

<h3 class="title">Order details</h3>

<form action="" method="post">
    <table class="form-table">
        <tbody>

        <tr valign="top">
            <th scope="row">ID</th>
            <td><?php echo $order->order_id; ?></td>
        </tr>

        <tr valign="top">
            <th scope="row">Event Name</th>
            <td><?php echo $order->event_name; ?></td>
        </tr>

        <tr valign="top">
            <th scope="row">First Name</th>
            <td><?php echo $order->first_name; ?></td>
        </tr>

        <tr valign="top">
            <th scope="row">Last Name</th>
            <td><?php echo $order->last_name; ?></td>
        </tr>

        <tr valign="top">
            <th scope="row">Email</th>
            <td><?php echo $order->email; ?></td>
        </tr>

        <tr valign="top">
            <th scope="row">Phone</th>
            <td><?php echo $order->phone; ?></td>
        </tr>

        <tr valign="top">
            <th scope="row">Notes</th>
            <td><?php echo $order->notes; ?></td>
        </tr>

        <tr valign="top">
            <th scope="row">Code</th>
            <td><?php echo $order->code; ?></td>
        </tr>

        <tr valign="top">
            <th scope="row"><label for="order-status">Status</label></th>
            <td>
                <select name="order-status" id="order-status">

                    <?php echo $this->get_order_statuses_options($order); ?>

                </select>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">Total Price</th>
            <td><?php echo $this->places_money_format($order->total_price); ?></td>
        </tr>

        <tr valign="top">
            <th scope="row">Places</th>
            <td>
                <?php foreach ($places as $place_id => $place): ?>
                    <p>#<?php echo $place_id; ?>: <?php echo $place['place_name']; ?> (<?php echo $this->places_money_format($place['place_price']); ?>)</p>
                <?php endforeach; ?>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row"><label for="order-admin-notes">Admin notes</label></th>
            <td>
                <textarea name="order-admin-notes" id="order-admin-notes" cols="50" rows="5"><?php echo esc_textarea($order->admin_notes); ?></textarea>
            </td>
        </tr>

        </tbody>
    </table>


    <p class="submit">
        <input type="submit" value="Save Changes" class="button button-primary" id="submit" name="submit">
        <a class="button" href="?page=<?php echo str_replace($this->plugin_slug . '_page_', '', $this->orders_page_screen_hook_suffix); ?>">Cancel</a>
    </p>
</form>