TYPE=VIEW
query=select date_format(convert_tz(`wp_wsm_bounceVisits`.`visitLastActionTime`,\'+00:00\',\'+01:00\'),\'%Y-%m-%d\') AS `recordDate`,count(0) AS `bounce` from `expwpdb`.`wp_wsm_bounceVisits` group by date_format(convert_tz(`wp_wsm_bounceVisits`.`visitLastActionTime`,\'+00:00\',\'+01:00\'),\'%Y-%m-%d\')
md5=858eaceadea6bd63b34133077f1612f6
updatable=0
algorithm=0
definer_user=expwp_user
definer_host=%
suid=2
with_check_option=0
timestamp=2025-06-21 07:14:41
create-version=1
source=SELECT DATE_FORMAT(CONVERT_TZ(visitLastActionTime,\'+00:00\',\'+01:00\'),\'%Y-%m-%d\') as recordDate, COUNT(*) as bounce FROM wp_wsm_bounceVisits GROUP BY DATE_FORMAT(CONVERT_TZ(visitLastActionTime,\'+00:00\',\'+01:00\'),\'%Y-%m-%d\')
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_520_ci
view_body_utf8=select date_format(convert_tz(`wp_wsm_bounceVisits`.`visitLastActionTime`,\'+00:00\',\'+01:00\'),\'%Y-%m-%d\') AS `recordDate`,count(0) AS `bounce` from `expwpdb`.`wp_wsm_bounceVisits` group by date_format(convert_tz(`wp_wsm_bounceVisits`.`visitLastActionTime`,\'+00:00\',\'+01:00\'),\'%Y-%m-%d\')
