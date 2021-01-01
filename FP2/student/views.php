<?php
    $user_ip=$_SERVER['REMOTE_ADDR'];$page=$_SERVER['PHP_SELF'];mysql_query("insert into views('','$page','$user_ip')");$views=mysql_query("SELECT  * FROM views");$total_pageviews=mysql_num_rows($views);
?>