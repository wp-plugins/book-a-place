<?php

/*
 * Select Schemes
 */

$schemes = $this->get_schemes();

?>


<!--    Scheme List-->
<form method="get" action="" id="posts-filter">

    <table cellspacing="0" class="wp-list-table widefat fixed posts">

        <thead>
        <tr>

            <th style="" class="manage-column column-title sortable desc" id="title" scope="col">
                <a href="">
                    <span>Name</span><span class="sorting-indicator"></span>
                </a>
            </th>
            <th style="" class="manage-column column-author" id="author" scope="col">
                Width
            </th>
            <th style="" class="manage-column column-categories" id="categories" scope="col">
                Height
            </th>
            <th style="" class="manage-column column-tags" id="tags" scope="col">
                Shortcode
            </th>

        </tr>
        </thead>

        <tfoot>
        <tr>

            <th style="" class="manage-column column-title sortable desc" scope="col">
                <a href="">
                    <span>Name</span><span class="sorting-indicator"></span>
                </a>
            </th>
            <th style="" class="manage-column column-author" scope="col">
                Width
            </th>
            <th style="" class="manage-column column-categories" scope="col">
                Height
            </th>
            <th style="" class="manage-column column-tags" scope="col">
                Shortcode
            </th>

        </tr>
        </tfoot>

        <tbody id="the-list">

        <?php if ($schemes && is_array($schemes)): ?>
            <?php foreach ($schemes as $scheme) : ?>

                <tr valign="top" class="post-1 type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self" id="post-1">

                    <td class="post-title page-title column-title">
                        <strong><a title="Edit" href="<?php echo $this->page_url; ?>&scheme=<?php echo $scheme->scheme_id; ?>&action=edit" class="row-title"><?php echo $scheme->name; ?></a></strong>

                        <div class="row-actions">
                            <span class="edit"><a title="Edit this item" href="<?php echo $this->page_url; ?>&scheme=<?php echo $scheme->scheme_id; ?>&action=edit">Edit</a> | </span>
                            <span class="view"><a rel="permalink" title="View this item" href="<?php echo $this->page_url; ?>&scheme=<?php echo $scheme->scheme_id; ?>&action=view">View</a> | </span>
                            <span class="trash"><a href="<?php echo $this->page_url; ?>&scheme=<?php echo $scheme->scheme_id; ?>&action=delete" title="Delete this item" class="submitdelete">Delete</a></span>
                        </div>
                    </td>
                    <td class="author column-author">
                        <?php echo $scheme->width; ?>
                    </td>
                    <td class="categories column-categories">
                        <?php echo $scheme->height; ?>
                    </td>
                    <td class="tags column-shortcodes">
                        <?php echo '[book_a_place scheme="' . $scheme->scheme_id . '"]'; ?>
                    </td>

                </tr>


            <?php endforeach; ?>

        <?php else : ?>

            <tr valign="top" class="post-1 type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self" id="post-1">
                <td colspan="4">
                    There are no schemes yet.
                </td>
            </tr>

        <?php endif; ?>


        </tbody>

    </table>

</form>
<!--    End Scheme List-->