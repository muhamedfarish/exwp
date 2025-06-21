TYPE=VIEW
query=select `hwb`.`hour` AS `hour`,`hwb`.`bounce` AS `bounce`,`hwp`.`pageViews` AS `pageViews`,`hwv`.`visitors` AS `visitors`,((`hwb`.`bounce` / `hwp`.`pageViews`) * 100) AS `bRatePageViews`,((`hwb`.`bounce` / `hwv`.`visitors`) * 100) AS `bRateVisitors` from ((`expwpdb`.`wp_wsm_hourWiseBounce` `hwb` left join `expwpdb`.`wp_wsm_hourWisePageViews` `hwp` on((`hwb`.`hour` = `hwp`.`hour`))) left join `expwpdb`.`wp_wsm_hourWiseVisitors` `hwv` on((`hwb`.`hour` = `hwv`.`hour`)))
md5=1e238fd7523560a97d8cb308f4dcc195
updatable=0
algorithm=0
definer_user=expwp_user
definer_host=%
suid=2
with_check_option=0
timestamp=2025-06-21 07:14:41
create-version=1
source=SELECT hwb.hour, hwb.bounce, hwp.pageViews, hwv.visitors, ((hwb.bounce/hwp.pageViews)*100) AS bRatePageViews, ((hwb.bounce/hwv.visitors)*100) AS bRateVisitors FROM wp_wsm_hourWiseBounce hwb LEFT JOIN wp_wsm_hourWisePageViews hwp ON hwb.hour=hwp.hour LEFT JOIN wp_wsm_hourWiseVisitors hwv ON hwb.hour=hwv.hour
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_520_ci
view_body_utf8=select `hwb`.`hour` AS `hour`,`hwb`.`bounce` AS `bounce`,`hwp`.`pageViews` AS `pageViews`,`hwv`.`visitors` AS `visitors`,((`hwb`.`bounce` / `hwp`.`pageViews`) * 100) AS `bRatePageViews`,((`hwb`.`bounce` / `hwv`.`visitors`) * 100) AS `bRateVisitors` from ((`expwpdb`.`wp_wsm_hourWiseBounce` `hwb` left join `expwpdb`.`wp_wsm_hourWisePageViews` `hwp` on((`hwb`.`hour` = `hwp`.`hour`))) left join `expwpdb`.`wp_wsm_hourWiseVisitors` `hwv` on((`hwb`.`hour` = `hwv`.`hour`)))
