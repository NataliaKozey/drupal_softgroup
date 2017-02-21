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
		
	    	<h1> Додати новину</h1>
	    	
	<form method="post" action = "add.php">
	  <div class="form-group">
	    <label for="tittle">Заголовок</label>
	    <input name="title" class="form-control" placeholder="Заголовок">
	  
	  
	    <label for="category">Категорія</label>
	    <select class="form-control" name='category'>
			  <option value="Політика">Політика</option>
			  <option value="Наука">Наука</option>
			  <option value="Культура">Культура</option>	
			  <option value="Релігія">Релігія</option>		
			  <option value="Економіка">Економіка</option>	   
		  </select>
	  <label for="tizer">Тизер</label>
	    <textarea class="form-control" rows="2" name='tizer'></textarea>
	    <label for="allText">Весь текст</label>
	    <textarea class="form-control" rows="10" name='aticle'></textarea>
	 		<label for="status">Статус</label>
		  <select type="hidden" class="form-control" name='status'>
			  <option value='published'>Опубліковано</option>
			  <option value='not published'>Не опубліковано</option>		   
		  </select>
		  
		   <input type='hidden' name='date', value="<?php echo (date('Y-m-d') . " " . date('H:i:s'));?>" />
	  		
	    <br>
	  <button type="submit" name="add" class="btn btn-default">Опублікувати</button>
	  </div>
	</form>
		<?php 
		include_once('db.php');
		if (isset($_POST['add'])) {
			$title = strip_tags(trim($_POST['title']));
			$aticle= strip_tags(trim($_POST['aticle']));
			$tizer = strip_tags(trim($_POST['tizer']));
			$date = $_POST['date'];
			$status = $_POST['status'];
			$category=$_POST['category'];

			

			mysql_query("
				INSERT INTO News(title, aticle, date, tizer, status, category) VALUES ('$title', '$aticle', '$date', '$tizer', '$status', '$category')

				");
			mysql_close();

		}
		?>
		<?php include('footer.php')  ?>


	</body>
</html>
