{* This template is included via hook product:product_list_item *}
{if $product.label_enabled && $product.label_text}
    <div class="product-label" style="background-color: {$product.label_color|default:'#ff0000'}; color: #fff; padding: 4px 8px; position: absolute; top: 10px; left: 10px; z-index: 2; border-radius: 3px; font-size: 12px; font-weight: bold;">
        {$product.label_text}
    </div>
{/if}

{if $product.sku_toggle && $product.additional_sku}
    <div class="product-additional-sku" style="font-size: 12px; color: #666; margin-top: 5px;">
        <span>{__("sku_label_control.additional_sku")}: {$product.additional_sku}</span>
    </div>
{/if}