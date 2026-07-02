<?php

namespace Tygh\Addons\SkuLabelControl\Service;

class SkuLabelService
{
    /**
     * Get extra data for a product.
     */
    public function getProductExtraData($product_id)
    {
        return db_get_row(
            "SELECT * FROM ?:sku_label_control_data WHERE product_id = ?i",
            $product_id
        );
    }

    /**
     * Get extra data for multiple products.
     */
    public function getProductsExtraData($product_ids)
    {
        if (empty($product_ids)) {
            return [];
        }
        $result = db_get_array(
            "SELECT * FROM ?:sku_label_control_data WHERE product_id IN (?n)",
            $product_ids
        );
        $mapped = [];
        foreach ($result as $row) {
            $mapped[$row['product_id']] = $row;
        }
        return $mapped;
    }

    /**
     * Save extra data for a product (insert or update).
     */
    public function saveProductExtraData($product_id, $data)
    {
        $exists = db_get_field(
            "SELECT product_id FROM ?:sku_label_control_data WHERE product_id = ?i",
            $product_id
        );
        if ($exists) {
            db_query(
                "UPDATE ?:sku_label_control_data SET ?u WHERE product_id = ?i",
                $data,
                $product_id
            );
        } else {
            $data['product_id'] = $product_id;
            db_query("INSERT INTO ?:sku_label_control_data ?e", $data);
        }
    }
}