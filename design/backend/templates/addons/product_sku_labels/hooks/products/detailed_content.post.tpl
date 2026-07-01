{if $product_data.product_id}
    <div class="control-group">
        <label class="control-label" for="elm_product_sku_labels_enable_custom_sku">Enable custom SKU</label>
        <div class="controls">
            <input type="hidden" name="product_data[product_sku_labels][enable_custom_sku]" value="N" />
            <input type="checkbox" name="product_data[product_sku_labels][enable_custom_sku]" id="elm_product_sku_labels_enable_custom_sku" value="Y" {if $product_data.product_sku_labels.enable_custom_sku == "Y"}checked="checked"{/if} />
            <span class="description">Show a custom SKU field for this product.</span>
        </div>
    </div>

    <div id="product_sku_labels_sku_field" class="control-group{if $product_data.product_sku_labels.enable_custom_sku != "Y"} hidden{/if}">
        <label class="control-label" for="elm_product_sku_labels_custom_sku">Custom SKU</label>
        <div class="controls">
            <input type="text" name="product_data[product_sku_labels][custom_sku]" id="elm_product_sku_labels_custom_sku" value="{$product_data.product_sku_labels.custom_sku}" size="40" />
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="elm_product_sku_labels_show_label">Show label on product card</label>
        <div class="controls">
            <input type="hidden" name="product_data[product_sku_labels][show_label]" value="N" />
            <input type="checkbox" name="product_data[product_sku_labels][show_label]" id="elm_product_sku_labels_show_label" value="Y" {if $product_data.product_sku_labels.show_label == "Y"}checked="checked"{/if} />
        </div>
    </div>

    <div id="product_sku_labels_label_fields" class="control-group{if $product_data.product_sku_labels.show_label != "Y"} hidden{/if}">
        <label class="control-label" for="elm_product_sku_labels_label_text">Label text</label>
        <div class="controls">
            <input type="text" name="product_data[product_sku_labels][label_text]" id="elm_product_sku_labels_label_text" value="{$product_data.product_sku_labels.label_text}" size="40" />
        </div>
        <label class="control-label" for="elm_product_sku_labels_label_style">Label style</label>
        <div class="controls">
            <select name="product_data[product_sku_labels][label_style]" id="elm_product_sku_labels_label_style">
                <option value="" {if $product_data.product_sku_labels.label_style == ''}selected="selected"{/if}>Default</option>
                <option value="sale" {if $product_data.product_sku_labels.label_style == 'sale'}selected="selected"{/if}>Sale</option>
                <option value="new" {if $product_data.product_sku_labels.label_style == 'new'}selected="selected"{/if}>New In</option>
                <option value="limited" {if $product_data.product_sku_labels.label_style == 'limited'}selected="selected"{/if}>Limited Stock</option>
                <option value="pre-loved" {if $product_data.product_sku_labels.label_style == 'pre-loved'}selected="selected"{/if}>Pre-Loved</option>
            </select>
        </div>
        <label class="control-label" for="elm_product_sku_labels_label_color">Custom label color</label>
        <div class="controls">
            <input type="text" name="product_data[product_sku_labels][label_color]" id="elm_product_sku_labels_label_color" value="{$product_data.product_sku_labels.label_color}" size="20" placeholder="#ff5a5f" />
        </div>
    </div>

    <script type="text/javascript">
        (function(_, $) {
            $(document).ready(function () {
                function toggleProductSkuLabels() {
                    var enableSku = $('#elm_product_sku_labels_enable_custom_sku').is(':checked');
                    var showLabel = $('#elm_product_sku_labels_show_label').is(':checked');

                    $('#product_sku_labels_sku_field').toggleClass('hidden', !enableSku);
                    $('#product_sku_labels_label_fields').toggleClass('hidden', !showLabel);
                }

                $('#elm_product_sku_labels_enable_custom_sku, #elm_product_sku_labels_show_label').on('change', toggleProductSkuLabels);
                toggleProductSkuLabels();
            });
        }(Tygh, Tygh.$));
    </script>
{/if}
