<?php

namespace Tygh\Addons\SkuLabelControl\Hooks\Export;

class ExportHook
{
    /**
     * Add extra fields to export.
     */
    public static function getFields($field_names)
    {
        $field_names['sku_toggle']    = 'sku_toggle';
        $field_names['additional_sku'] = 'additional_sku';
        $field_names['label_enabled']  = 'label_enabled';
        $field_names['label_text']     = 'label_text';
        $field_names['label_color']    = 'label_color';
        return $field_names;
    }

    /**
     * Fill extra fields during export.
     */
    public static function getData($export_options, $product_data, &$export_data)
    {
        // Fields are already in $product_data via our getDataPost/getProductsPost hooks,
        // so we just pass them directly.
        $export_data['sku_toggle']    = isset($product_data['sku_toggle']) ? $product_data['sku_toggle'] : 0;
        $export_data['additional_sku'] = isset($product_data['additional_sku']) ? $product_data['additional_sku'] : '';
        $export_data['label_enabled']  = isset($product_data['label_enabled']) ? $product_data['label_enabled'] : 0;
        $export_data['label_text']     = isset($product_data['label_text']) ? $product_data['label_text'] : '';
        $export_data['label_color']    = isset($product_data['label_color']) ? $product_data['label_color'] : '';
    }
}