CREATE TABLE IF NOT EXISTS ?:product_sku_labels (
  product_id int(10) unsigned NOT NULL,
  enable_custom_sku char(1) NOT NULL DEFAULT 'N',
  custom_sku varchar(64) NOT NULL DEFAULT '',
  show_label char(1) NOT NULL DEFAULT 'N',
  label_text varchar(255) NOT NULL DEFAULT '',
  label_color varchar(64) NOT NULL DEFAULT '',
  label_style varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (product_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
