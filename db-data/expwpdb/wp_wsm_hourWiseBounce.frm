TYPE=VIEW
query=select hour(convert_tz(`wp_wsm_bounceVisits`.`visitLastActionTime`,\'+00:00\',\'+01:00\')) AS `hour`,count(0) AS `bounce` from `expwpdb`.`wp_wsm_bounceVisits` where (convert_tz(`wp_wsm_bounceVisits`.`visitLastActionTime`,\'+00:00\',\'+01:00\') >= \'2025-06-21 00:00:00\') group by hour(convert_tz(`wp_wsm_bounceVisits`.`visitLastActionTime`,\'+00:00\',\'+01:00\'))
md5=d9c1de68529e71121f0246e19559fce9
updatable=0
algorithm=0
definer_user=expwp_user
definer_host=%
suid=2
with_check_option=0
timestamp=2025-06-21 07:14:41
create-version=1
source=SELECT HOUR(CONVERT_TZ(visitLastActionTime,\'+00:00\',\'+01:00\')) as hour, COUNT(*) as bounce FROM wp_wsm_bounceVisits WHERE CONVERT_TZ(visitLastActionTime,\'+00:00\',\'+01:00\') >= \'2025-06-21 00:00:00\' GROUP BY HOUR(CONVERT_TZ(visitLastActionTime,\'+00:00\',\'+01:00\'))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_520_ci
view_body_utf8=select hour(convert_tz(`wp_wsm_bounceVisits`.`visitLastActionTime`,\'+00:00\',\'+01:00\')) AS `hour`,count(0) AS `bounce` from `expwpdb`.`wp_wsm_bounceVisits` where (convert_tz(`wp_wsm_bounceVisits`.`visitLastActionTime`,\'+00:00\',\'+01:00\') >= \'2025-06-21 00:00:00\') group by hour(convert_tz(`wp_wsm_bounceVisits`.`visitLastActionTime`,\'+00:00\',\'+01:00\'))
