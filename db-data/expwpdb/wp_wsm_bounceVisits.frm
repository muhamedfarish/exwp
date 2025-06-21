TYPE=VIEW
query=select `wp_wsm_pageViews`.`visitId` AS `visitId`,`wp_wsm_pageViews`.`visitLastActionTime` AS `visitLastActionTime` from `expwpdb`.`wp_wsm_pageViews` group by `wp_wsm_pageViews`.`visitId` having (count(`wp_wsm_pageViews`.`URLId`) = 1)
md5=d03fb535c97f3fb8d5d50b7e5dc1d99e
updatable=0
algorithm=0
definer_user=expwp_user
definer_host=%
suid=2
with_check_option=0
timestamp=2025-06-06 13:59:21
create-version=1
source=SELECT visitId, visitLastActionTime FROM wp_wsm_pageViews GROUP BY visitId HAVING COUNT(URLId)=1
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_520_ci
view_body_utf8=select `wp_wsm_pageViews`.`visitId` AS `visitId`,`wp_wsm_pageViews`.`visitLastActionTime` AS `visitLastActionTime` from `expwpdb`.`wp_wsm_pageViews` group by `wp_wsm_pageViews`.`visitId` having (count(`wp_wsm_pageViews`.`URLId`) = 1)
