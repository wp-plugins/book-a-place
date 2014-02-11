<?php

/*
 * Select Orders
 */

$orders = $this->get_orders();

?>

<div class="orders-actions">
    <a href="<?php echo $this->page_url; ?>&action=clear" title="<?php _e("Clear table", $this->plugin_slug); ?>" class="button orders-clear-submit"><?php _e("Clear", $this->plugin_slug); ?></a>
</div>

<!--    Order List-->
<form method="get" action="" id="posts-filter">

    <table cellspacing="0" class="wp-list-table widefat fixed posts">

        <thead>
        <tr>

            <th style="" class="" scope="col">
                <?php _e("ID", $this->plugin_slug); ?>
            </th>
            <th style="" class="" scope="col">
                <?php _e("Event Name", $this->plugin_slug); ?>
            </th>
            <th style="" class="" scope="col">
                <?php _e("First Name", $this->plugin_slug); ?>
            </th>
            <th style="" class="" scope="col">
                <?php _e("Last Name", $this->plugin_slug); ?>
            </th>
            <th style="" class="" scope="col">
                <?php _e("Email", $this->plugin_slug); ?>
            </th>
            <th style="" class="" scope="col">
                <?php _e("Phone", $this->plugin_slug); ?>
            </th>
            <th style="" class="" scope="col">
                <?php _e("Date", $this->plugin_slug); ?>
            </th>
            <th style="" class="" scope="col">
                <?php _e("Code", $this->plugin_slug); ?>
            </th>
            <th style="" class="" scope="col">
                <?php _e("Total price", $this->plugin_slug); ?>
            </th>
            <th style="" class="" scope="col">
                <?php _e("Status", $this->plugin_slug); ?>
            </th>

        </tr>
        </thead>

        <tfoot>
        <tr>

            <th style="" class="" scope="col">
                <?php _e("ID", $this->plugin_slug); ?>
            </th>
            <th style="" class="" scope="col">
                <?php _e("Event Name", $this->plugin_slug); ?>
            </th>
            <th style="" class="" scope="col">
                <?php _e("First Name", $this->plugin_slug); ?>
            </th>
            <th style="" class="" scope="col">
                <?php _e("Last Name", $this->plugin_slug); ?>
            </th>
            <th style="" class="" scope="col">
                <?php _e("Email", $this->plugin_slug); ?>
            </th>
            <th style="" class="" scope="col">
                <?php _e("Phone", $this->plugin_slug); ?>
            </th>
            <th style="" class="" scope="col">
                <?php _e("Date", $this->plugin_slug); ?>
            </th>
            <th style="" class="" scope="col">
                <?php _e("Code", $this->plugin_slug); ?>
            </th>
            <th style="" class="" scope="col">
                <?php _e("Total price", $this->plugin_slug); ?>
            </th>
            <th style="" class="" scope="col">
                <?php _e("Status", $this->plugin_slug); ?>
            </th>

        </tr>
        </tfoot>

        <tbody id="the-list">

        <?php if ($orders && is_array($orders)): ?>
            <?php foreach ($orders as $order) : ?>

                <tr valign="top" class="post-1 type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self" id="post-1">

                    <td class="post-title page-title column-title">
                        <strong><?php echo $order->order_id; ?></strong>

                        <div class="row-actions">
                            <span class="view"><a rel="permalink" title="<?php _e("View this item", $this->plugin_slug); ?>" href="<?php echo $this->page_url; ?>&order=<?php echo $order->order_id; ?>&action=view"><?php _e("View", $this->plugin_slug); ?></a>  </span> |
                            <span class="trash submitdelete"><a href="<?php echo $this->page_url; ?>&order=<?php echo $order->order_id; ?>&action=delete" title="<?php _e("Delete this item", $this->plugin_slug); ?>"><?php _e("Delete", $this->plugin_slug); ?></a></span>
                        </div>
                    </td>
                    <td class="author column-author">
                        <?php echo $order->event_name; ?>
                    </td>
                    <td class="author column-author">
                        <?php echo $order->first_name; ?>
                    </td>
                    <td class="categories column-categories">
                        <?php echo $order->last_name; ?>
                    </td>
                    <td class="tags column-tags">
                        <?php echo $order->email; ?>
                    </td>
                    <td class="tags column-tags">
                        <?php echo $order->phone; ?>
                    </td>
                    <td class="tags column-tags">
                        <?php echo $order->date; ?>
                    </td>
                    <td class="tags column-tags">
                        <?php echo $order->code; ?>
                    </td>
                    <td class="tags column-tags">
                        <?php echo $this->places_money_format($order->total_price); ?>
                    </td>
                    <td class="tags column-tags">
                        <?php echo $this->order_statuses[$order->status_id]; ?>
                    </td>

                </tr>


            <?php endforeach; ?>

        <?php else : ?>

        <tr valign="top" class="post-1 type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self" id="post-1">
            <td colspan="10">
                <?php _e("There are no orders yet.", $this->plugin_slug); ?>
            </td>
        </tr>

        <?php endif; ?>


        </tbody>

    </table>

</form>
<!--    End Order List-->

<div class="orders-actions">
    <a href="<?php echo $this->page_url; ?>&action=clear" title="<?php _e("Clear table", $this->plugin_slug); ?>" class="button orders-clear-submit"><?php _e("Clear", $this->plugin_slug); ?></a>
</div>

<script type="text/javascript">
    jQuery('.submitdelete').click(function() {
        if (!confirm('<?php _e("Are you sure you want to delete this item?", $this->plugin_slug); ?>')) {
            return false;
        }
    });

    jQuery('.orders-clear-submit').click(function() {
        if (!confirm('<?php _e("Are you sure you want to clear this list?", $this->plugin_slug); ?>')) {
            return false;
        }
    });
</script>