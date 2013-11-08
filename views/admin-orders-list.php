<?php

/*
 * Select Orders
 */

$orders = $this->get_orders();

?>


<!--    Order List-->
<form method="get" action="" id="posts-filter">

    <table cellspacing="0" class="wp-list-table widefat fixed posts">

        <thead>
        <tr>

            <th style="" class="" scope="col">
                ID
            </th>
            <th style="" class="" scope="col">
                First Name
            </th>
            <th style="" class="" scope="col">
                Last Name
            </th>
            <th style="" class="" scope="col">
                Email
            </th>
            <th style="" class="" scope="col">
                Phone
            </th>
            <th style="" class="" scope="col">
                Date
            </th>
            <th style="" class="" scope="col">
                Code
            </th>
            <th style="" class="" scope="col">
                Total price
            </th>
            <th style="" class="" scope="col">
                Status
            </th>

        </tr>
        </thead>

        <tfoot>
        <tr>

            <th style="" class="" scope="col">
                ID
            </th>
            <th style="" class="" scope="col">
                First Name
            </th>
            <th style="" class="" scope="col">
                Last Name
            </th>
            <th style="" class="" scope="col">
                Email
            </th>
            <th style="" class="" scope="col">
                Phone
            </th>
            <th style="" class="" scope="col">
                Date
            </th>
            <th style="" class="" scope="col">
                Code
            </th>
            <th style="" class="" scope="col">
                Total price
            </th>
            <th style="" class="" scope="col">
                Status
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
<!--                            <span class="edit"><a title="Edit this item" href="--><?php //echo $this->page_url; ?><!--&order=--><?php //echo $order->order_id; ?><!--&action=edit">Edit</a> | </span>-->
                            <span class="view"><a rel="permalink" title="View this item" href="<?php echo $this->page_url; ?>&order=<?php echo $order->order_id; ?>&action=view">View</a>  </span>
<!--                            <span class="trash"><a href="--><?php //echo $this->page_url; ?><!--&order=--><?php //echo $order->order_id; ?><!--&action=delete" title="Delete this item" class="submitdelete">Delete</a></span>-->
                        </div>
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
            <td colspan="9">
                There are no orders yet.
            </td>
        </tr>

        <?php endif; ?>


        </tbody>

    </table>

</form>
<!--    End Order List-->