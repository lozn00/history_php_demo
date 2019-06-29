<table width=100% border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#00ff00">
<?Php
echo "<tr><td><a href='index.php?userid=".@$_GET['userid']."&usersid=".@$_GET['usersid']."'>网站首页</a>";
echo "-<a href='manger.php?userid=".@$_GET["userid"]."&usersid=".@
$_GET["usersid"]."'>后台管理</a>-" ."<a href='admin.php?userid=".@$_GET["userid"]."&usersid=".@
$_GET["usersid"]."'>用户登录</a>"."</td></tr>";
?></table></body></html>