##Important Infos

Admin Email : eesha@gmail.com		
User_Id : 3
Admin Password : 01786122963

##When website failed to run
Solved a very big problem:
#Permission denied on storage/logs..

- First:
Go to public file. Delete Storage folder (which actually a folder link).
Then use 
<pre> php artisan storage:link </pre>

- Second:
<pre> php artisan optimize:clear </pre>
if not working then 
<pre> composer update </pre>

- Third:
<pre> php artisan serve </pre>

##Database
Client : phpmyadmin
Database name : classroom
classroom.sql is provided

##If website doesn't run, you should have used this command to clear caches
php artisan route:clear && php artisan view:clear && php artisan config:clear && php artisan cache:clear && php artisan clear-compiled