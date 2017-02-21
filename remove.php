
<!DOCTYPE html >

<html>
  <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/my_style.css">

      <title>News</title>


  </head>
	<body>
		<?php include('header.php')  ?>
				<?php 
		include_once("db.php");
		$id = $_GET['id'];
		mysql_query("
			DELETE FROM News WHERE id='$id'
			");
		mysql_close();
		?>
		<a href='index.php'><p>Повернутись до новин</p></a>
		<?php include('footer.php')  ?>

	</body>
</html>