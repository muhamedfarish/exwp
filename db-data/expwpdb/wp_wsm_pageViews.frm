TYPE=VIEW
query=select `LV`.`visitId` AS `visitId`,`LV`.`URLId` AS `URLId`,`LV`.`keyword` AS `keyword`,`LV`.`refererUrlId` AS `refererUrlId`,`LU`.`countryId` AS `countryId`,`LU`.`regionId` AS `regionId`,count(0) AS `totalViews`,max(`LV`.`serverTime`) AS `visitLastActionTime` from (`expwpdb`.`wp_wsm_logVisit` `LV` left join `expwpdb`.`wp_wsm_logUniqueVisit` `LU` on((`LV`.`visitId` = `LU`.`id`))) group by `LV`.`visitId`,`LV`.`URLId`
md5=bb281b7edb6e2ecd13134522c4925967
updatable=0
algorithm=0
definer_user=expwp_user
definer_host=%
suid=2
with_check_option=0
timestamp=2025-06-06 13:59:21
create-version=1
source=SELECT LV.visitId, LV.URLId, LV.keyword, LV.refererUrlId, LU.countryId, LU.regionId, COUNT(*) As totalViews, max(LV.serverTime) AS visitLastActionTime FROM wp_wsm_logVisit LV LEFT JOIN wp_wsm_logUniqueVisit LU ON LV.visitId=LU.id GROUP BY LV.visitId, LV.URLId
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_520_ci
view_body_utf8=select `LV`.`visitId` AS `visitId`,`LV`.`URLId` AS `URLId`,`LV`.`keyword` AS `keyword`,`LV`.`refererUrlId` AS `refererUrlId`,`LU`.`countryId` AS `countryId`,`LU`.`regionId` AS `regionId`,count(0) AS `totalViews`,max(`LV`.`serverTime`) AS `visitLastActionTime` from (`expwpdb`.`wp_wsm_logVisit` `LV` left join `expwpdb`.`wp_wsm_logUniqueVisit` `LU` on((`LV`.`visitId` = `LU`.`id`))) group by `LV`.`visitId`,`LV`.`URLId`
