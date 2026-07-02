{* This template is included via hook product:product_code *}
{if $product.sku_toggle && $product.additional_sku}
    <div class="sku-label-control-additional-sku">
        <span class="sku">{__("sku_label_control.additional_sku")}:</span>
        <span class="sku-value">{$product.additional_sku}</span>
    </div>
{/if}