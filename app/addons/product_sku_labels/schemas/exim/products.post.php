<?php
/***************************************************************************
*                                                                          *
*   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
*                                                                          *
****************************************************************************
* PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
* "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
****************************************************************************/

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}

/**
 * @var array $schema
 */

$schema['export_fields']['Custom SKU'] = [
    'process_get' => ['fn_product_sku_labels_exim_get_custom_sku', '#key'],
    'process_put' => ['fn_product_sku_labels_exim_put_custom_sku', '#key', '#this'],
];

$schema['export_fields']['Enable custom SKU'] = [
    'process_get' => ['fn_product_sku_labels_exim_get_enable_custom_sku', '#key'],
    'process_put' => ['fn_product_sku_labels_exim_put_enable_custom_sku', '#key', '#this'],
];

$schema['export_fields']['Show product label'] = [
    'process_get' => ['fn_product_sku_labels_exim_get_show_label', '#key'],
    'process_put' => ['fn_product_sku_labels_exim_put_show_label', '#key', '#this'],
];

$schema['export_fields']['Product label text'] = [
    'process_get' => ['fn_product_sku_labels_exim_get_label_text', '#key'],
    'process_put' => ['fn_product_sku_labels_exim_put_label_text', '#key', '#this'],
];

$schema['export_fields']['Product label color'] = [
    'process_get' => ['fn_product_sku_labels_exim_get_label_color', '#key'],
    'process_put' => ['fn_product_sku_labels_exim_put_label_color', '#key', '#this'],
];

$schema['export_fields']['Product label style'] = [
    'process_get' => ['fn_product_sku_labels_exim_get_label_style', '#key'],
    'process_put' => ['fn_product_sku_labels_exim_put_label_style', '#key', '#this'],
];

return $schema;
