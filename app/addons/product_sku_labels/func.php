<?php
/***************************************************************************
*                                                                          *
*   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
*                                                                          *
****************************************************************************
* PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
* "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
****************************************************************************/

defined('BOOTSTRAP') or die('Access denied');

function fn_product_sku_labels_get_product_data_post(array &$product_data, $auth, $preview, $lang_code)
{
    if (empty($product_data['product_id'])) {
        return;
    }

    $product_data['product_sku_labels'] = fn_product_sku_labels_get_data((int) $product_data['product_id']);
}

function fn_product_sku_labels_get_products_post(array &$products, array $params, $lang_code)
{
    if (empty($products)) {
        return;
    }

    $product_ids = array_keys($products);
    $rows = db_get_hash_array(
        'SELECT * FROM ?:product_sku_labels WHERE product_id IN (?n)',
        'product_id',
        $product_ids
    );

    foreach ($products as &$product) {
        $product_id = (int) $product['product_id'];
        $product['product_sku_labels'] = !empty($rows[$product_id])
            ? $rows[$product_id]
            : fn_product_sku_labels_get_default_data($product_id);
    }
    unset($product);
}

function fn_product_sku_labels_update_product_post(array $product_data, $product_id, $lang_code, $create)
{
    if (empty($product_id) || empty($product_data['product_sku_labels'])) {
        return;
    }

    fn_product_sku_labels_save_data((int) $product_id, $product_data['product_sku_labels']);
}

function fn_product_sku_labels_get_data($product_id)
{
    $data = db_get_row('SELECT * FROM ?:product_sku_labels WHERE product_id = ?i', (int) $product_id);

    if (empty($data)) {
        return fn_product_sku_labels_get_default_data((int) $product_id);
    }

    return [
        'product_id' => (int) $product_id,
        'enable_custom_sku' => isset($data['enable_custom_sku']) ? $data['enable_custom_sku'] : 'N',
        'custom_sku' => isset($data['custom_sku']) ? $data['custom_sku'] : '',
        'show_label' => isset($data['show_label']) ? $data['show_label'] : 'N',
        'label_text' => isset($data['label_text']) ? $data['label_text'] : '',
        'label_color' => isset($data['label_color']) ? $data['label_color'] : '',
        'label_style' => isset($data['label_style']) ? $data['label_style'] : '',
    ];
}

function fn_product_sku_labels_get_default_data($product_id)
{
    return [
        'product_id' => (int) $product_id,
        'enable_custom_sku' => 'N',
        'custom_sku' => '',
        'show_label' => 'N',
        'label_text' => '',
        'label_color' => '',
        'label_style' => '',
    ];
}

function fn_product_sku_labels_save_data($product_id, array $data)
{
    $record = [
        'product_id' => (int) $product_id,
        'enable_custom_sku' => fn_product_sku_labels_to_db_flag($data['enable_custom_sku'] ?? ''),
        'custom_sku' => trim((string) ($data['custom_sku'] ?? '')),
        'show_label' => fn_product_sku_labels_to_db_flag($data['show_label'] ?? ''),
        'label_text' => trim((string) ($data['label_text'] ?? '')),
        'label_color' => trim((string) ($data['label_color'] ?? '')),
        'label_style' => trim((string) ($data['label_style'] ?? '')),
    ];

    $exists = db_get_field('SELECT product_id FROM ?:product_sku_labels WHERE product_id = ?i', (int) $product_id);

    if ($exists) {
        db_query('UPDATE ?:product_sku_labels SET ?u WHERE product_id = ?i', $record, (int) $product_id);
    } else {
        db_query('INSERT INTO ?:product_sku_labels ?e', $record);
    }
}

function fn_product_sku_labels_to_db_flag($value)
{
    if ($value === 'Y' || $value === 'Yes' || $value === true || $value === 1 || $value === '1') {
        return 'Y';
    }

    return 'N';
}

function fn_product_sku_labels_exim_get_custom_sku($product_id)
{
    $data = fn_product_sku_labels_get_data((int) $product_id);

    return $data['custom_sku'];
}

function fn_product_sku_labels_exim_put_custom_sku($product_id, $value)
{
    $data = fn_product_sku_labels_get_data((int) $product_id);
    $data['custom_sku'] = (string) $value;
    fn_product_sku_labels_save_data((int) $product_id, $data);
}

function fn_product_sku_labels_exim_get_enable_custom_sku($product_id)
{
    $data = fn_product_sku_labels_get_data((int) $product_id);

    return $data['enable_custom_sku'];
}

function fn_product_sku_labels_exim_put_enable_custom_sku($product_id, $value)
{
    $data = fn_product_sku_labels_get_data((int) $product_id);
    $data['enable_custom_sku'] = fn_product_sku_labels_to_db_flag($value);
    fn_product_sku_labels_save_data((int) $product_id, $data);
}

function fn_product_sku_labels_exim_get_show_label($product_id)
{
    $data = fn_product_sku_labels_get_data((int) $product_id);

    return $data['show_label'];
}

function fn_product_sku_labels_exim_put_show_label($product_id, $value)
{
    $data = fn_product_sku_labels_get_data((int) $product_id);
    $data['show_label'] = fn_product_sku_labels_to_db_flag($value);
    fn_product_sku_labels_save_data((int) $product_id, $data);
}

function fn_product_sku_labels_exim_get_label_text($product_id)
{
    $data = fn_product_sku_labels_get_data((int) $product_id);

    return $data['label_text'];
}

function fn_product_sku_labels_exim_put_label_text($product_id, $value)
{
    $data = fn_product_sku_labels_get_data((int) $product_id);
    $data['label_text'] = (string) $value;
    fn_product_sku_labels_save_data((int) $product_id, $data);
}

function fn_product_sku_labels_exim_get_label_color($product_id)
{
    $data = fn_product_sku_labels_get_data((int) $product_id);

    return $data['label_color'];
}

function fn_product_sku_labels_exim_put_label_color($product_id, $value)
{
    $data = fn_product_sku_labels_get_data((int) $product_id);
    $data['label_color'] = (string) $value;
    fn_product_sku_labels_save_data((int) $product_id, $data);
}

function fn_product_sku_labels_exim_get_label_style($product_id)
{
    $data = fn_product_sku_labels_get_data((int) $product_id);

    return $data['label_style'];
}

function fn_product_sku_labels_exim_put_label_style($product_id, $value)
{
    $data = fn_product_sku_labels_get_data((int) $product_id);
    $data['label_style'] = (string) $value;
    fn_product_sku_labels_save_data((int) $product_id, $data);
}
