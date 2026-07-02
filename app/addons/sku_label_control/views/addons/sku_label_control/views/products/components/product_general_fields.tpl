<div class="control-group">
    <label class="control-label" for="sku_toggle">{__("sku_label_control.sku_toggle")}:</label>
    <div class="controls">
        <input type="hidden" name="product_data[sku_toggle]" value="0" />
        <input type="checkbox" name="product_data[sku_toggle]" id="sku_toggle" value="1" {if $product_data.sku_toggle}checked="checked"{/if} />
    </div>
</div>

<div class="control-group" id="additional_sku_wrapper">
    <label class="control-label" for="additional_sku">{__("sku_label_control.additional_sku")}:</label>
    <div class="controls">
        <input type="text" name="product_data[additional_sku]" id="additional_sku" value="{$product_data.additional_sku}" size="30" />
        <p class="muted description">{__("sku_label_control.additional_sku_description")}</p>
    </div>
</div>

<hr />

<div class="control-group">
    <label class="control-label" for="label_enabled">{__("sku_label_control.label_enabled")}:</label>
    <div class="controls">
        <input type="hidden" name="product_data[label_enabled]" value="0" />
        <input type="checkbox" name="product_data[label_enabled]" id="label_enabled" value="1" {if $product_data.label_enabled}checked="checked"{/if} />
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="label_text">{__("sku_label_control.label_text")}:</label>
    <div class="controls">
        <input type="text" name="product_data[label_text]" id="label_text" value="{$product_data.label_text}" size="30" />
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="label_color">{__("sku_label_control.label_color")}:</label>
    <div class="controls">
        <input type="text" name="product_data[label_color]" id="label_color" value="{$product_data.label_color}" size="15" placeholder="#ff0000" />
        <p class="muted description">{__("sku_label_control.label_color_description")}</p>
    </div>
</div>

<script type="text/javascript">
    // Toggle the additional SKU field visibility based on checkbox
    (function( $ ) {
        $(document).ready(function() {
            var $toggle = $('#sku_toggle');
            var $wrapper = $('#additional_sku_wrapper');
            function toggleField() {
                if ($toggle.is(':checked')) {
                    $wrapper.show();
                } else {
                    $wrapper.hide();
                }
            }
            $toggle.on('change', toggleField);
            toggleField();
        });
    })(jQuery);
</script>