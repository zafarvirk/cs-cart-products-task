{assign var="custom_sku" value=$product.product_sku_labels.custom_sku|default:''}
{assign var="enable_custom_sku" value=$product.product_sku_labels.enable_custom_sku|default:'N'}
{assign var="show_label" value=$product.product_sku_labels.show_label|default:'N'}
{assign var="label_text" value=$product.product_sku_labels.label_text|default:''}
{assign var="label_color" value=$product.product_sku_labels.label_color|default:''}
{assign var="label_style" value=$product.product_sku_labels.label_style|default:''}

{if $enable_custom_sku == 'Y' && $custom_sku}
    <div style="margin: 6px 0 8px; font-size: 12px; font-weight: 600; color: #4a4a4a;">SKU: {$custom_sku}</div>
{/if}

{if $show_label == 'Y' && $label_text}
    {assign var="badge_color" value="#ff6b6b"}
    {assign var="badge_text_color" value="#ffffff"}

    {if $label_style == 'new'}
        {assign var="badge_color" value="#1f9d6d"}
    {elseif $label_style == 'limited'}
        {assign var="badge_color" value="#f59e0b"}
    {elseif $label_style == 'pre-loved'}
        {assign var="badge_color" value="#8b5cf6"}
    {elseif $label_style == 'sale'}
        {assign var="badge_color" value="#ef4444"}
    {/if}

    {if $label_color}
        {assign var="badge_color" value=$label_color}
    {/if}

    <div style="display: inline-block; margin-top: 6px; padding: 4px 8px; border-radius: 999px; background-color: {$badge_color}; color: {$badge_text_color}; font-size: 12px; font-weight: 700; line-height: 1;">{$label_text}</div>
{/if}
