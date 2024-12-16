ALTER TABLE `calculations`
MODIFY COLUMN `cbm`  decimal(10,4) NULL DEFAULT NULL AFTER `product_description`,
MODIFY COLUMN `cbm_per_container`  decimal(10,4) NULL DEFAULT NULL AFTER `cbm`,
MODIFY COLUMN `cost_per_product`  decimal(10,4) NULL DEFAULT NULL AFTER `container_size`,
MODIFY COLUMN `freight_cost`  decimal(10,4) NULL DEFAULT NULL AFTER `cost_per_product`,
MODIFY COLUMN `cost_of_duty`  decimal(10,4) NULL DEFAULT NULL AFTER `freight_cost`,
MODIFY COLUMN `fx_rate`  decimal(10,4) NULL DEFAULT NULL AFTER `cost_of_duty`,
MODIFY COLUMN `total_cost`  decimal(10,4) NULL DEFAULT NULL AFTER `fx_rate`,
MODIFY COLUMN `inland_freight_charges`  decimal(10,4) NULL DEFAULT NULL AFTER `total_cost`,
MODIFY COLUMN `misc_charges`  decimal(10,4) NULL DEFAULT NULL AFTER `inland_freight_charges`,
MODIFY COLUMN `misc_charges_percentage`  decimal(10,4) NULL DEFAULT NULL AFTER `misc_charges`,
MODIFY COLUMN `grand_total`  decimal(10,4) NULL DEFAULT NULL AFTER `misc_charges_percentage`,
ADD COLUMN `cbm_method`  varchar(50) NULL DEFAULT 'manual' AFTER `notes`,
ADD COLUMN `product_width`  decimal(10,4) NULL AFTER `cbm_method`,
ADD COLUMN `product_length`  decimal(10,4) NULL AFTER `product_width`,
ADD COLUMN `product_height`  decimal(10,4) NULL AFTER `product_length`,
ADD COLUMN `product_weight`  decimal(10,4) NULL AFTER `product_height`,
ADD COLUMN `weight_per_container`  decimal(10,4) NULL AFTER `product_weight`,
ADD COLUMN `gross_total`  decimal(10,4) NULL AFTER `weight_per_container`;

ALTER TABLE `calculations`
ADD COLUMN `gross_total_per_product`  decimal(10,4) NULL DEFAULT NULL AFTER `gross_total`,
ADD COLUMN `grand_total_per_product`  decimal(10,4) NULL DEFAULT NULL AFTER `gross_total_per_product`;

ALTER TABLE `calculations`
ADD COLUMN `cbm_unit`  varchar(50) NULL AFTER `grand_total_per_product`;


ALTER TABLE `calculations`
MODIFY COLUMN `cbm`  decimal(10,2) NULL DEFAULT NULL AFTER `product_description`,
MODIFY COLUMN `cbm_per_container`  decimal(10,2) NULL DEFAULT NULL AFTER `cbm`,
MODIFY COLUMN `container_size`  varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL AFTER `cbm_per_container`,
MODIFY COLUMN `cost_per_product`  decimal(10,2) NULL DEFAULT NULL AFTER `container_size`,
MODIFY COLUMN `freight_cost`  decimal(10,2) NULL DEFAULT NULL AFTER `cost_per_product`,
MODIFY COLUMN `cost_of_duty`  decimal(10,2) NULL DEFAULT NULL AFTER `freight_cost`,
MODIFY COLUMN `fx_rate`  decimal(10,2) NULL DEFAULT NULL AFTER `cost_of_duty`,
MODIFY COLUMN `total_cost`  decimal(10,2) NULL DEFAULT NULL AFTER `fx_rate`,
MODIFY COLUMN `inland_freight_charges`  decimal(10,2) NULL DEFAULT NULL AFTER `total_cost`,
MODIFY COLUMN `misc_charges`  decimal(10,2) NULL DEFAULT NULL AFTER `inland_freight_charges`,
MODIFY COLUMN `misc_charges_percentage`  decimal(10,2) NULL DEFAULT NULL AFTER `misc_charges`,
MODIFY COLUMN `grand_total`  decimal(10,2) NULL DEFAULT NULL AFTER `misc_charges_percentage`,
MODIFY COLUMN `notes`  varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL AFTER `updated_at`,
MODIFY COLUMN `product_width`  decimal(10,2) NULL DEFAULT NULL AFTER `cbm_method`,
MODIFY COLUMN `product_length`  decimal(10,2) NULL DEFAULT NULL AFTER `product_width`,
MODIFY COLUMN `product_height`  decimal(10,2) NULL DEFAULT NULL AFTER `product_length`,
MODIFY COLUMN `product_weight`  decimal(10,2) NULL DEFAULT NULL AFTER `product_height`,
MODIFY COLUMN `weight_per_container`  decimal(10,2) NULL DEFAULT NULL AFTER `product_weight`,
MODIFY COLUMN `gross_total`  decimal(10,2) NULL DEFAULT NULL AFTER `weight_per_container`,
MODIFY COLUMN `gross_total_per_product`  decimal(10,2) NULL DEFAULT NULL AFTER `gross_total`,
MODIFY COLUMN `grand_total_per_product`  decimal(10,2) NULL DEFAULT NULL AFTER `gross_total_per_product`,
MODIFY COLUMN `cbm_unit`  varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL AFTER `grand_total_per_product`;

---------------------------------

ALTER TABLE `calculations`
ADD COLUMN `total_product_per_container`  decimal(10,2) NULL DEFAULT NULL AFTER `cbm_unit`;
-------------
ALTER TABLE `calculations`
ADD COLUMN `total_product_cost`  decimal(10,2) NULL DEFAULT NULL AFTER `total_product_per_container`;







