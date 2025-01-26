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







