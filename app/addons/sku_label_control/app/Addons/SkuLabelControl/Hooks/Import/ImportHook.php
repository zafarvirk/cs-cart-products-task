<?php

namespace Tygh\Addons\SkuLabelControl\Hooks\Import;

use Tygh\Addons\SkuLabelControl\Service\SkuLabelService;

class ImportHook
{
    /**
     * Add extra fields to the import mapping.
     */
    public static function extraFields($fields, $pattern, $pattern_ignore)
    {
        $fields['sku_toggle']    = ['process' => true];
        $fields['additional_sku'] = ['process' => true];
        $fields['label_enabled']  = ['process' => true];
        $fields['label_text']     = ['process' => true];
        $fields['label_color']    = ['process' => true];
        return $fields;
    }

    /**
     * Save imported extra data after product is imported.
     */
    public static function afterImport($product_id, $data, $options, $overrides)
    {
        $service = new SkuLabelService();
        $save_data = [];
        // Only save if the field exists in import data
        if (isset($data['sku_toggle'])) {
            $save_data['sku_toggle'] = (int)$data['sku_toggle'];
        }
        if (isset($data['additional_sku'])) {
            $save_data['additional_sku'] = trim($data['additional_sku']);
        }
        if (isset($data['label_enabled'])) {
            $save_data['label_enabled'] = (int)$data['label_enabled'];
        }
        if (isset($data['label_text'])) {
            $save_data['label_text'] = trim($data['label_text']);
        }
        if (isset($data['label_color'])) {
            $save_data['label_color'] = trim($data['label_color']);
        }
        if (!empty($save_data)) {
            $service->saveProductExtraData($product_id, $save_data);
        }
    }
}