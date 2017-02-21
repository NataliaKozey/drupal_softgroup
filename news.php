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
		$result = mysql_query(" SELECT * FROM News WHERE id='$id'
			");
		$row = mysql_fetch_array($result);
		?>
		<h1><?php echo $row['title'] ?></h1>
			
			<p id='aticle'><?php echo $row['aticle'] ?></p>
			<p>Категорія <?php echo $row['category'] ?></p>
			
			<p>Дата публікації <?php echo $row['date'] ?></p>
		<?php include('footer.php')  ?>


	</body>
</html>
