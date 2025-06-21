TYPE=VIEW
query=select `mwb`.`recordMonth` AS `recordMonth`,`mwb`.`bounce` AS `bounce`,`mwp`.`pageViews` AS `pageViews`,`mwv`.`visitors` AS `visitors`,((`mwb`.`bounce` / `mwp`.`pageViews`) * 100) AS `bRatePageViews`,((`mwb`.`bounce` / `mwv`.`visitors`) * 100) AS `bRateVisitors` from ((`expwpdb`.`wp_wsm_monthWiseBounce` `mwb` left join `expwpdb`.`wp_wsm_monthWisePageViews` `mwp` on((`mwb`.`recordMonth` = `mwp`.`recordMonth`))) left join `expwpdb`.`wp_wsm_monthWiseVisitors` `mwv` on((`mwb`.`recordMonth` = `mwv`.`recordMonth`)))
md5=09454b462466d4bfbc9a4912478d9d2a
updatable=0
algorithm=0
definer_user=expwp_user
definer_host=%
suid=2
with_check_option=0
timestamp=2025-06-06 13:59:21
create-version=1
source=SELECT mwb.recordMonth, mwb.bounce, mwp.pageViews, mwv.visitors, ((mwb.bounce/mwp.pageViews)*100) AS bRatePageViews, ((mwb.bounce/mwv.visitors)*100) AS bRateVisitors FROM wp_wsm_monthWiseBounce mwb LEFT JOIN wp_wsm_monthWisePageViews mwp ON mwb.recordMonth=mwp.recordMonth LEFT JOIN wp_wsm_monthWiseVisitors mwv ON mwb.recordMonth=mwv.recordMonth
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_520_ci
view_body_utf8=select `mwb`.`recordMonth` AS `recordMonth`,`mwb`.`bounce` AS `bounce`,`mwp`.`pageViews` AS `pageViews`,`mwv`.`visitors` AS `visitors`,((`mwb`.`bounce` / `mwp`.`pageViews`) * 100) AS `bRatePageViews`,((`mwb`.`bounce` / `mwv`.`visitors`) * 100) AS `bRateVisitors` from ((`expwpdb`.`wp_wsm_monthWiseBounce` `mwb` left join `expwpdb`.`wp_wsm_monthWisePageViews` `mwp` on((`mwb`.`recordMonth` = `mwp`.`recordMonth`))) left join `expwpdb`.`wp_wsm_monthWiseVisitors` `mwv` on((`mwb`.`recordMonth` = `mwv`.`recordMonth`)))
