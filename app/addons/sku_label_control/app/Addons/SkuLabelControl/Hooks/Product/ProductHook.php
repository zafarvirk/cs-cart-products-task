<?php

namespace Tygh\Addons\SkuLabelControl\Hooks\Product;

use Tygh\Addons\SkuLabelControl\Service\SkuLabelService;
use Tygh\Registry;

class ProductHook
{
    /**
     * Loads extra data when a single product is fetched.
     */
    public static function getDataPost($product_id, &$product_data)
    {
        $service = new SkuLabelService();
        $extra = $service->getProductExtraData($product_id);
        if ($extra) {
            $product_data['sku_toggle']    = $extra['sku_toggle'];
            $product_data['additional_sku'] = $extra['additional_sku'];
            $product_data['label_enabled']  = $extra['label_enabled'];
            $product_data['label_text']     = $extra['label_text'];
            $product_data['label_color']    = $extra['label_color'];
        } else {
            // Defaults
            $product_data['sku_toggle']    = 0;
            $product_data['additional_sku'] = '';
            $product_data['label_enabled']  = 0;
            $product_data['label_text']     = '';
            $product_data['label_color']    = '';
        }
    }

    /**
     * Bulk loads extra data for multiple products (lists).
     */
    public static function getProductsPost($params, $fields, $sortings, &$products)
    {
        if (empty($products)) {
            return;
        }
        $ids = array_keys($products);
        $service = new SkuLabelService();
        $extra_map = $service->getProductsExtraData($ids);
        foreach ($products as $product_id => &$product) {
            if (isset($extra_map[$product_id])) {
                $product['sku_toggle']    = $extra_map[$product_id]['sku_toggle'];
                $product['additional_sku'] = $extra_map[$product_id]['additional_sku'];
                $product['label_enabled']  = $extra_map[$product_id]['label_enabled'];
                $product['label_text']     = $extra_map[$product_id]['label_text'];
                $product['label_color']    = $extra_map[$product_id]['label_color'];
            } else {
                $product['sku_toggle']    = 0;
                $product['additional_sku'] = '';
                $product['label_enabled']  = 0;
                $product['label_text']     = '';
                $product['label_color']    = '';
            }
        }
    }

    /**
     * Saves extra data after product update.
     */
    public static function updatePost($product_id, $product_data, $prev_product_data, $updated)
    {
        if (!$updated) {
            return;
        }
        $service = new SkuLabelService();
        $data = [
            'sku_toggle'    => isset($product_data['sku_toggle']) ? (int)$product_data['sku_toggle'] : 0,
            'additional_sku' => isset($product_data['additional_sku']) ? trim($product_data['additional_sku']) : '',
            'label_enabled'  => isset($product_data['label_enabled']) ? (int)$product_data['label_enabled'] : 0,
            'label_text'     => isset($product_data['label_text']) ? trim($product_data['label_text']) : '',
            'label_color'    => isset($product_data['label_color']) ? trim($product_data['label_color']) : '',
        ];
        $service->saveProductExtraData($product_id, $data);
    }

    /**
     * Adds custom fields to the product general tab.
     */
    public static function formGeneral($product_data, &$template)
    {
        Registry::get('view')->assign('product_data', $product_data);
        $template[] = 'addons/sku_label_control/views/products/components/product_general_fields.tpl';
    }
}