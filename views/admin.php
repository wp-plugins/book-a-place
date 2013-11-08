<?php
/**
 * Represents the view for the administration dashboard.
 *
 * @package   Book a Place
 * @author    ArtkanMedia
 * @license   GPL-2.0+
 * @copyright 2013 ArtkanMedia
 */
?>
<div class="wrap">

    <?php screen_icon('options-general'); ?>
    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>


    <div class="bap-description">

        <p>
            Booking places, seats, tickets… In theatres, cinemas, restaurants etc. It’s really convenient, when people are able to book a place online. With our plugin it’s possible.
        </p>

        <p>
            Book a Place plugin is very easy to use by both parties: users, who want to book a place, and administrators, who create a scheme, add places, set prices etc. We created our plugin as simple as possible. And we are ready to continue working on it to make it better.
        </p>

        <h3>How to</h3>

        <ol>
            <li>
                You should go to <strong>Schemes</strong> section and create a new scheme there. Scheme is just a scheme of your theatre, cinema or restaurant. There you should input name, description, width and height. <br/> <br/>
                <strong>Name</strong> is just a name. <br/>
                In <strong>description</strong> you should describe the event, mention the date and time and other important info. <br/>
                <strong>Width</strong> – number of cells horizontally. In each cell you will be able to set a place. Each cell is like a 1 square meter. <br/>
                <strong>Height</strong> – number of cells vertically. <br/> <br/>
                Are you confused a bit? Don’t worry, we are almost there :)
            </li>
            <li>
                Now you should find your scheme in listing and click on <strong>View</strong>.
            </li>
            <li>
                Here you can set <strong>places</strong>, <strong>prices</strong> etc. Use colors to group similar things. Create different places using several cells.
            </li>
            <li>
                You can find a <strong>shortcode</strong> for each scheme in Schemes section. This shortcode can be embedded to any post or page.
            </li>
        </ol>

        <p>
            That’s it! Now everybody can book a place. You will get an email about this as administrator and user will get an email too. Email templates can be edited in <strong>Settings</strong> section (‘<strong>E-mail templates</strong>’ tab). In section <strong>Orders</strong> administrator will find information
            about all orders.
        </p>

    </div>

</div>
