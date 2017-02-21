<?php $connection = mysql_connect('localhost', 'news', '1111');
			$db = mysql_select_db("newsbd");
			mysql_query("SET NAMES 'utf8'");
			if(!$connection|| !$db){
				exit(mysql_error());
			}
?>