TYPE=VIEW
query=select `dwb`.`recordDate` AS `recordDate`,`dwb`.`bounce` AS `bounce`,`dwp`.`pageViews` AS `pageViews`,`dwv`.`visitors` AS `visitors`,((`dwb`.`bounce` / `dwp`.`pageViews`) * 100) AS `bRatePageViews`,((`dwb`.`bounce` / `dwv`.`visitors`) * 100) AS `bRateVisitors` from ((`expwpdb`.`wp_wsm_dateWiseBounce` `dwb` left join `expwpdb`.`wp_wsm_dateWisePageViews` `dwp` on((`dwb`.`recordDate` = `dwp`.`recordDate`))) left join `expwpdb`.`wp_wsm_dateWiseVisitors` `dwv` on((`dwb`.`recordDate` = `dwv`.`recordDate`)))
md5=74d11db8e13f67b3bf50fa9e22babdd0
updatable=0
algorithm=0
definer_user=expwp_user
definer_host=%
suid=2
with_check_option=0
timestamp=2025-06-21 07:14:41
create-version=1
source=SELECT dwb.recordDate, dwb.bounce, dwp.pageViews, dwv.visitors, ((dwb.bounce/dwp.pageViews)*100) AS bRatePageViews, ((dwb.bounce/dwv.visitors)*100) AS bRateVisitors FROM wp_wsm_dateWiseBounce dwb LEFT JOIN wp_wsm_dateWisePageViews dwp ON dwb.recordDate=dwp.recordDate LEFT JOIN wp_wsm_dateWiseVisitors dwv ON dwb.recordDate=dwv.recordDate
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_520_ci
view_body_utf8=select `dwb`.`recordDate` AS `recordDate`,`dwb`.`bounce` AS `bounce`,`dwp`.`pageViews` AS `pageViews`,`dwv`.`visitors` AS `visitors`,((`dwb`.`bounce` / `dwp`.`pageViews`) * 100) AS `bRatePageViews`,((`dwb`.`bounce` / `dwv`.`visitors`) * 100) AS `bRateVisitors` from ((`expwpdb`.`wp_wsm_dateWiseBounce` `dwb` left join `expwpdb`.`wp_wsm_dateWisePageViews` `dwp` on((`dwb`.`recordDate` = `dwp`.`recordDate`))) left join `expwpdb`.`wp_wsm_dateWiseVisitors` `dwv` on((`dwb`.`recordDate` = `dwv`.`recordDate`)))
