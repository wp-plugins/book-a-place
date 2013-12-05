<form action="" method="post">
    <input type="hidden" name="current-tab" value="1"/>

    <h3 class="title">New order admin template</h3>

    <table class="form-table">
        <tbody>

        <tr valign="top">
            <th scope="row"><label for="subject-admin">Subject</label></th>
            <td>
                <input type="text" class="regular-text" value="<?php echo isset($email_template_new_order_admin['subject']) ? esc_attr($email_template_new_order_admin['subject']) : ''; ?>" id="subject-admin" name="subject-admin">
            </td>
        </tr>

        <tr valign="top">
            <th scope="row"><label for="message-admin">Message</label></th>
            <td>
                <textarea rows="10" class="large-text" id="message-admin" name="message-admin"><?php echo isset($email_template_new_order_admin['message']) ? esc_textarea($email_template_new_order_admin['message']) : ''; ?></textarea>
                <br>
                <span class="description">
                    You can use the following keywords:
                    &lt;first_name&gt;,
                    &lt;last_name&gt;,
                    &lt;email&gt;,
                    &lt;phone&gt;,
                    &lt;notes&gt;,
                    &lt;date&gt;,
                    &lt;code&gt;,
                    &lt;places&gt;,
                    &lt;total_price&gt;,
                    &lt;status&gt;
                </span>
            </td>
        </tr>

        </tbody>
    </table>

    <h3 class="title">New order customer template</h3>

    <table class="form-table">
        <tbody>

        <tr valign="top">
            <th scope="row"><label for="subject-user">Subject</label></th>
            <td>
                <input type="text" class="regular-text" value="<?php echo isset($email_template_new_order_user['subject']) ? esc_attr($email_template_new_order_user['subject']) : ''; ?>" id="subject-user" name="subject-user">
            </td>
        </tr>

        <tr valign="top">
            <th scope="row"><label for="message-user">Message</label></th>
            <td>
                <textarea rows="10" class="large-text" id="message-user" name="message-user"><?php echo isset($email_template_new_order_user['message']) ? esc_textarea($email_template_new_order_user['message']) : ''; ?></textarea>
                <br>
                <span class="description">
                    You can use the following keywords:
                    &lt;first_name&gt;,
                    &lt;last_name&gt;,
                    &lt;email&gt;,
                    &lt;phone&gt;,
                    &lt;notes&gt;,
                    &lt;date&gt;,
                    &lt;code&gt;,
                    &lt;places&gt;,
                    &lt;total_price&gt;,
                    &lt;status&gt;
                </span>
            </td>
        </tr>

        </tbody>
    </table>


    <p class="submit">
        <input type="submit" value="Save Changes" class="button button-primary" id="submit" name="submit">
    </p>
</form>