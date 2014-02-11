<div id="scheme-place-dialog-form" title="Set a place">
    <p class="validateTips">All form fields are required.</p>
    <form>
        <fieldset>
            <input type="hidden" name="action" value=""/>
            <label for="scheme-place-name">Name</label>
            <input type="text" name="scheme-place-name" id="scheme-place-name" class="text" />
            <label for="scheme-place-description">Description</label>
            <textarea name="scheme-place-description" id="scheme-place-description" class="text"></textarea>
            <label for="scheme-place-price">Price</label>
            <input type="text" name="scheme-place-price" id="scheme-place-price" value="" class="text" />
            <div id="scheme-cell-color">
                <input type="text" value="#bada55" class="scheme-cell-color-field" data-default-color="#effeff" />
            </div>
        </fieldset>
    </form>
</div>

<div id="scheme-place-status-form" title="Change place status">
    <form>
        <fieldset>
            <label for="scheme-place-status">Place status: </label>
            <select name="scheme-place-status" id="scheme-place-status">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </fieldset>
    </form>
</div>

<div id="scheme-controls">
    <a id="scheme-set-place" href="#">Set</a>
    <a id="scheme-edit-place" href="#">Edit</a>
    <a id="scheme-unset-place" href="#">Unset</a>
    <a id="scheme-change-place-status" href="#">Change Status</a>
</div>

<div id="scheme-container">

    <?php echo $this->display_scheme($_GET['scheme']); ?>

</div>