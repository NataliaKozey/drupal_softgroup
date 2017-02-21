<div id="main-content" class="container">
       		<?php 
       		include_once ("db.php");
       		$countView = 10;
			if(isset($_GET['page'])){
    			$pageNum = (int)$_GET['page'];
				}
				else{
    				$pageNum = 1;
					}
			$startIndex = ($pageNum-1)*$countView;
			$sql = mysql_query(" SELECT SQL_CALC_FOUND_ROWS * FROM News ORDER BY date DESC LIMIT $startIndex, $countView") or die(mysql_error());
			$newsData = array();
			while($result = mysql_fetch_array($sql, MYSQL_ASSOC)){
    			$newsData[] = $result;
    		}
    		
			$sql2 = mysql_query("SELECT FOUND_ROWS()");
			$result2 = mysql_fetch_array($sql2, MYSQL_ASSOC);
			$countAllNews = $result2["FOUND_ROWS()"];
			
			$lastPage = ceil($countAllNews/$countView);
			
			mysql_close();
?>

<div id="main-content">
    
    <?php foreach($newsData as $oneNews){ 
    	if($oneNews['status']=="published"){ ?>
    		 <div class="one_news">
        <a href="/news.php?id=<?=$oneNews['id'];?>"><h1><?=$oneNews['title'];?></h1></a>
        <p><?=$oneNews['tizer'];?></p>
        <p>Категорія <?=$oneNews['category'];?></p>
        <p>Дата публікації <?=$oneNews['date'];?></p>
        <ul>
        <li><a href = 'edit.php?id=<?php echo $oneNews['id'] ?>'> <button class="btn btn-primary btn-lg" ><span class="glyphicon glyphicon-pencil" 
        ></span>Редагувати</button></a></li> <br/>
        <li><a href = 'remove.php?id=<?php echo $oneNews['id'] ?>'><button class="btn btn-danger btn-lg" ><span class="glyphicon glyphicon-trash" 
        ></span>Видалити  </button></a></li>
        </ul>
                  
			
        
        <hr/>
    </div>
    		<?php } ?>
   
    <?php } ?>
    <br/>
    
    <div class='large-3 large-offset-5 columns'>
    <ul class='pagination'>
        <?php if($pageNum > 1) { ?>
            <li><a href="/index.php?page=1">&laquo;</a></li>
            <li><a href="/index.php?page=<?=$pageNum-1;?>">&laquo;</a></li>
        <?php } ?>
         
        <?php for($i = 1; $i<=$lastPage; $i++) { ?>
            <li <?=($i == $pageNum) ? 'class="current"' : '';?>> <a href="/index.php?page=<?=$i;?>"><?=$i;?></a> </li>
        <?php } ?>
         
        <?php if($pageNum < $lastPage) { ?>
            <li><a href="/index.php?page=<?=$pageNum+1;?>">&raquo;</a></li>
            <li><a href="/index.php?page=<?=$lastPage;?>">&raquo;</a></li>
        <?php } ?>
    </ul>
	</div>
</div>
        
    

          
</div>