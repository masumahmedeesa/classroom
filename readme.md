# Important Infos

<pre>
Admin Email : eesha@gmail.com <br>
User_Id : 3 <br>
Admin Password : 01786122963
</pre>

# When website failed to run
Solved a very big problem:
WHAT IF, Permission denied on storage/logs..

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

# Database
Client : phpmyadmin <br>
Database name : classroom <br>
classroom.sql is provided

# If website doesn't run, you should have used this command to clear caches
php artisan route:clear && php artisan view:clear && php artisan config:clear && php artisan cache:clear && php artisan clear-compiled