<?php

if (!defined('BOOTSTRAP')) { die('Access denied'); }

function fn_sku_label_control_install()
{
    db_query("CREATE TABLE IF NOT EXISTS ?:sku_label_control_data (
        product_id int(11) unsigned NOT NULL,
        sku_toggle tinyint(1) unsigned NOT NULL DEFAULT 0,
        additional_sku varchar(255) NOT NULL DEFAULT '',
        label_enabled tinyint(1) unsigned NOT NULL DEFAULT 0,
        label_text varchar(255) NOT NULL DEFAULT '',
        label_color varchar(50) NOT NULL DEFAULT '',
        PRIMARY KEY (product_id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
}

function fn_sku_label_control_uninstall()
{
    db_query("DROP TABLE IF EXISTS ?:sku_label_control_data;");
}

if (defined('INSTALLER_INSTALL')) {
    fn_sku_label_control_install();
}

if (defined('INSTALLER_UNINSTALL')) {
    fn_sku_label_control_uninstall();
}