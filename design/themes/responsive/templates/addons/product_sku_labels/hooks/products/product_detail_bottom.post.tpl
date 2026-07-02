{if $product.product_sku_labels.enable_custom_sku == "Y" && $product.product_sku_labels.custom_sku}
    <div class="ty-product-detail-sku">
        <span class="ty-product-detail-sku__label">Custom SKU:</span>
        <span class="ty-product-detail-sku__value">{$product.product_sku_labels.custom_sku|escape}</span>
    </div>
{/if}

{if $product.product_sku_labels.show_label == "Y" && $product.product_sku_labels.label_text}
    <div class="ty-product-detail-label">
        <span class="ty-product-sku-label {if $product.product_sku_labels.label_style}ty-product-sku-label--`$product.product_sku_labels.label_style`{/if}"{if $product.product_sku_labels.label_color} style="background-color: {$product.product_sku_labels.label_color|escape}"{/if}>
            {$product.product_sku_labels.label_text nofilter}
        </span>
    </div>
{/if}
