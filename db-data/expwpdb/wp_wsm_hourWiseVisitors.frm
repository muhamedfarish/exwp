TYPE=VIEW
query=select hour(convert_tz(`expwpdb`.`wp_wsm_logUniqueVisit`.`firstActionVisitTime`,\'+00:00\',\'+01:00\')) AS `hour`,count(0) AS `visitors` from `expwpdb`.`wp_wsm_logUniqueVisit` where (convert_tz(`expwpdb`.`wp_wsm_logUniqueVisit`.`firstActionVisitTime`,\'+00:00\',\'+01:00\') >= \'2025-06-21 00:00:00\') group by hour(convert_tz(`expwpdb`.`wp_wsm_logUniqueVisit`.`firstActionVisitTime`,\'+00:00\',\'+01:00\'))
md5=268f1868a7b8595f08d48c549551a46c
updatable=0
algorithm=0
definer_user=expwp_user
definer_host=%
suid=2
with_check_option=0
timestamp=2025-06-21 07:14:41
create-version=1
source=SELECT HOUR(CONVERT_TZ(firstActionVisitTime,\'+00:00\',\'+01:00\')) as hour, COUNT(*) as visitors FROM wp_wsm_logUniqueVisit WHERE CONVERT_TZ(firstActionVisitTime,\'+00:00\',\'+01:00\') >= \'2025-06-21 00:00:00\' GROUP BY HOUR(CONVERT_TZ(firstActionVisitTime,\'+00:00\',\'+01:00\'))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_520_ci
view_body_utf8=select hour(convert_tz(`expwpdb`.`wp_wsm_logUniqueVisit`.`firstActionVisitTime`,\'+00:00\',\'+01:00\')) AS `hour`,count(0) AS `visitors` from `expwpdb`.`wp_wsm_logUniqueVisit` where (convert_tz(`expwpdb`.`wp_wsm_logUniqueVisit`.`firstActionVisitTime`,\'+00:00\',\'+01:00\') >= \'2025-06-21 00:00:00\') group by hour(convert_tz(`expwpdb`.`wp_wsm_logUniqueVisit`.`firstActionVisitTime`,\'+00:00\',\'+01:00\'))
