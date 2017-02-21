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
		
	    	<h1> Редагувати новину</h1>

			<?php 
			include_once('db.php');
			$id = $_GET['id'];
			$result = mysql_query(" SELECT * FROM News WHERE id='$id'
			");
			
			$row = mysql_fetch_array($result);
			if (isset($_POST['save'])) {
				$title = strip_tags(trim($_POST['title']));
				$aticle= strip_tags(trim($_POST['aticle']));
				$tizer = strip_tags(trim($_POST['tizer']));
				

				

				mysql_query("
					UPDATE News SET title='$title', aticle='$aticle', tizer='$tizer' WHERE id='$id'

					");
				mysql_close();

			}
			?>
			    	
	<form method="post" action="edit.php?id=<?php echo $id; ?>">
	  <div class="form-group">
	    <label for="tittle">Заголовок</label>
	    <input name="title" class="form-control" id="Title" placeholder="Title" value="<?php echo $row['title']; ?>" />
	    
	  <label for="tizer">Тизер</label>
	    <textarea class="form-control" rows="2" name='tizer' ><?php echo $row['tizer']; ?></textarea>
	    <label for="allText">Весь текст</label>
	    <textarea class="form-control" rows="7" name='aticle'><?php echo $row['aticle']; ?></textarea>
	   		
	    <br>
	  <button type="submit" name="save" class="btn btn-default">Зберегти</button>
	  </div>
	</form>

		<?php include('footer.php')  ?>


	</body>
</html>
