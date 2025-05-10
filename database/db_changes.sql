ALTER TABLE `accounts`
ADD COLUMN `ref_name`  varchar(100) NULL AFTER `updated_at`,
ADD COLUMN `ref_id`  bigint(20) NULL AFTER `ref_name`;

ALTER TABLE `banks`
ADD COLUMN `account_id`  bigint(20) NULL AFTER `updated_at`;

ALTER TABLE `accounts`
ADD COLUMN `status`  tinyint(2) NULL DEFAULT 1 AFTER `ref_id`;

ALTER TABLE `customers`
ADD COLUMN `account_id`  bigint(20) NULL AFTER `tax_percentage`;

ALTER TABLE `customers`
MODIFY COLUMN `status`  tinyint(2) NULL DEFAULT 1 AFTER `tax_number`;

ALTER TABLE `bikes`
ADD COLUMN `status`  tinyint(2) NULL DEFAULT 1 AFTER `policy_no`;

ALTER TABLE `sims`
MODIFY COLUMN `status`  tinyint(2) NULL DEFAULT 1 AFTER `fleet_supervisor`;

ALTER TABLE `sims`
MODIFY COLUMN `assign_to`  bigint(20) UNSIGNED NULL AFTER `company`;

ALTER TABLE `bikes`
MODIFY COLUMN `company`  int(11) NULL AFTER `engine`;

ALTER TABLE `leasing_companies`
MODIFY COLUMN `status`  tinyint(2) NULL DEFAULT 1 AFTER `detail`;

ALTER TABLE `garages`
MODIFY COLUMN `status`  tinyint(2) NULL DEFAULT 1 AFTER `detail`;

--------------------

--24-01-2025---
ALTER TABLE `riders`
ADD COLUMN `account_id`  int(11) NULL AFTER `rider_id`;

ALTER TABLE `transactions`
CHANGE COLUMN `entry_id` `trans_code`  bigint(20) NOT NULL AFTER `id`;

DROP TABLE IF EXISTS `vouchers`;
CREATE TABLE `vouchers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `trans_date` date DEFAULT NULL,
  `trans_code` bigint(20) DEFAULT NULL,
  `posting_date` date DEFAULT NULL,
  `billing_month` date DEFAULT NULL,
  `payment_to` bigint(20) DEFAULT NULL,
  `payment_from` bigint(20) DEFAULT NULL,
  `payment_type` tinyint(2) DEFAULT NULL,
  `voucher_type` tinyint(2) DEFAULT 1,
  `reason` varchar(255) DEFAULT NULL,
  `amount` decimal(30,2) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `ref_id` bigint(20) DEFAULT NULL,
  `rider_id` bigint(20) DEFAULT NULL,
  `vendor_id` bigint(20) DEFAULT NULL,
  `status` tinyint(2) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `invoice_voucher_type` tinyint(2) DEFAULT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `toll_gate` varchar(50) DEFAULT NULL,
  `trip_date` datetime DEFAULT NULL,
  `direction` varchar(255) DEFAULT NULL,
  `lease_company` bigint(20) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  `attach_file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

---------------

ALTER TABLE `accounts`
MODIFY COLUMN `account_code`  varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL AFTER `id`;

-----------------------

ALTER TABLE `accounts`
ADD COLUMN `notes`  varchar(500) NULL AFTER `status`;

ALTER TABLE `leasing_companies`
ADD COLUMN `account_id`  bigint(20) NULL AFTER `updated_at`;
-------------

ALTER TABLE `vouchers`
MODIFY COLUMN `voucher_type`  varchar(20) NULL DEFAULT '1' AFTER `payment_type`;
--------------

INSERT INTO `permissions` (`parent_id`, `name`, `guard_name`) VALUES ('102', 'voucher_document', 'web');
------------

ALTER TABLE `transactions`
ADD COLUMN `trans_date`  date NULL AFTER `id`;
---------------

ALTER TABLE `rider_invoices`
CHANGE COLUMN `RID` `rider_id`  bigint(20) UNSIGNED NOT NULL AFTER `inv_date`,
CHANGE COLUMN `VID` `vendor_id`  bigint(20) UNSIGNED NOT NULL AFTER `rider_id`;
--------------

ALTER TABLE `items`
ADD COLUMN `status`  tinyint(2) NULL DEFAULT 1 AFTER `vat`;
------------

ALTER TABLE `items`
ADD COLUMN `code`  varchar(50) NULL AFTER `status`,
ADD COLUMN `barcode`  varchar(50) NULL AFTER `code`;
------------









