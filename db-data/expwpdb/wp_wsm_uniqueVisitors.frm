TYPE=VIEW
query=select `LU`.`id` AS `id`,`LU`.`visitorId` AS `visitorId`,sum(`LU`.`totalTimeVisit`) AS `totalTimeVisit`,min(`LV`.`serverTime`) AS `firstVisitTime`,`LU`.`refererUrlId` AS `refererUrlId` from (`expwpdb`.`wp_wsm_logUniqueVisit` `LU` left join `expwpdb`.`wp_wsm_logVisit` `LV` on((`LV`.`visitId` = `LU`.`id`))) group by `LU`.`visitorId`
md5=536ef554d3738097fa2913a25040be3b
updatable=0
algorithm=0
definer_user=expwp_user
definer_host=%
suid=2
with_check_option=0
timestamp=2025-06-06 13:59:21
create-version=1
source=SELECT LU.id, LU.visitorId,sum(LU.totalTimeVisit) as totalTimeVisit,MIN(LV.serverTime) as firstVisitTime, LU.refererUrlId FROM wp_wsm_logUniqueVisit LU LEFT JOIN wp_wsm_logVisit LV ON LV.visitId=LU.id GROUP BY LU.visitorId
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_520_ci
view_body_utf8=select `LU`.`id` AS `id`,`LU`.`visitorId` AS `visitorId`,sum(`LU`.`totalTimeVisit`) AS `totalTimeVisit`,min(`LV`.`serverTime`) AS `firstVisitTime`,`LU`.`refererUrlId` AS `refererUrlId` from (`expwpdb`.`wp_wsm_logUniqueVisit` `LU` left join `expwpdb`.`wp_wsm_logVisit` `LV` on((`LV`.`visitId` = `LU`.`id`))) group by `LU`.`visitorId`
