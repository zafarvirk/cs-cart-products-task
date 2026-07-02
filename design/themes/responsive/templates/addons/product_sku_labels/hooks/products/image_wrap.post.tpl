{if $product.product_sku_labels.show_label == "Y" && $product.product_sku_labels.label_text}
<div class="ty-product-sku-label-wrapper">
    <span class="ty-product-sku-label {if $product.product_sku_labels.label_style}ty-product-sku-label--`$product.product_sku_labels.label_style`{/if}"{if $product.product_sku_labels.label_color} style="background-color: {$product.product_sku_labels.label_color|escape}"{/if}>
        {$product.product_sku_labels.label_text nofilter}
    </span>
</div>
{/if}
