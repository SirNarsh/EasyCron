# EasyCron
Run continuous PHP cron job task 

Usage
Put the following code on your crontab using SSH  'crontab -e'
'* * * * * php /home/pathtoscript/cron.php >/dev/null 2>&1'
This will confirm the script is always running (note that each minute the script will check if another instance is already running, if not it will start)

To log output use the following line istead
'* * * * * php /home/pathtoscript/cron.php >> /home/path_to_log'
