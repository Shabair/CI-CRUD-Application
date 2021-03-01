<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-02-18 11:03:17 --> Query error: Table 'crud.groups' doesn't exist - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` IS NULL
ERROR - 2021-02-18 11:03:27 --> Query error: Table 'crud.groups' doesn't exist - Invalid query: SELECT `users_groups`.`group_id` as `id`, `groups`.`name`, `groups`.`description`
FROM `users_groups`
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` IS NULL
ERROR - 2021-02-18 11:04:15 --> Query error: Table 'crud.video' doesn't exist - Invalid query: SELECT v.`id` vid,v.`url` vurl,v.`slug`  vslug,v.`title` vtitle,v.`thumbnail` vthumbnail,v.`created` vcreated,v.`last_update` vlastupdate,p.`slug` pslug,p.`title` ptitle FROM `video` as `v`  left join `category` as `p` on v.`category` = p.`id` WHERE v.`active` = '1' AND v.`published` = '1'  ORDER BY v.`id` DESC limit 6
ERROR - 2021-02-18 11:04:55 --> Query error: Table 'crud.seo_data' doesn't exist - Invalid query: INSERT INTO `seo_data` (`seo_keywords`, `seo_description`, `item_id`, `table`) VALUES ('', '', 41, 'record')
