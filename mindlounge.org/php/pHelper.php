<?php
	if(!isset($_COOKIE['loggedIn'])){
		header("Location: index.php");
		}
	include_once "config.php";
/***********************************************************************
	Adding News for Demo request by applying check on addnews POST parameter
************************************************************************/
	if(isset($_POST['addnews'])){
		$news = filter_input(INPUT_POST, 'news', FILTER_SANITIZE_SPECIAL_CHARS);
		$name = $_COOKIE['fname'];
		$title = substr($news,0,250);
		
		
		$sql = "INSERT INTO news (description, name, date, title) VALUES ('".$news."', '".$name."', '".date('Y-m-d H:i:s')."' ,'".$title."')";
		//$sql = "INSERT INTO news (description, name, date) VALUES ('".$news."', '".$name."', '".date('Y-m-d H:i:s')."')";
		mysql_query($sql);
		}
/********************************************************************
	 Preparing and getting response for latest feed items.
*********************************************************************/
	if(isset($_POST['latest_news_time'])){
		$sql = "SELECT * FROM news ";  
		$sql .= "WHERE date > '".$_POST['latest_news_time']."' ";
		$sql .= "ORDER BY date DESC";
		$resource = mysql_query($sql);
		$current_time = $_POST['latest_news_time'];
		$item = mysql_fetch_assoc($resource);
		$last_news_time = $item['date'];
		
			while ($last_news_time < $current_time){
				usleep(1000); //giving some rest to CPU
				$resource = mysql_query($sql);
				$item = mysql_fetch_assoc($resource);
				$last_news_time = $item['date'];
				if(!$item['date']){
					$last_news_time = -1;
				}
		}
		?>
		<li class="response" name="<?php echo $item['id'] ?>" id="<?php echo $item['date'] ?>">
								<span class="feedtext">
						<img src="http://vignette2.wikia.nocookie.net/le-miiverse-resource/images/d/d0/Funny-profile-pictures-02.jpg/revision/latest?cb=20141022011820" style= "height: 40px; width: 40px; background-color:grey;" class="profilePic">
						<span class="left">
						
						
						
						<?php echo $item['name'] ?>
						<span class="date"><?php echo $item['date'] ?></span>
						</span>
						<br>
						<br>
						<span class="feedTitle">
						<?php echo $item['title'] ?> 
						<br>
						</span>
						<span >

						<br>
						<button style="align: right;" class="JoinChat" id="<?php echo $item['id'] ?>" type="button">View Idea</button>
						</span>
						</span>
		</li>
		<?php
		exit;
		

	}
/********************************************************************
	 Getting news Items and preparing sql query with respect to request
**********************************************************************/
	$sql = "SELECT * FROM news ORDER BY date DESC LIMIT 0, 5";
	if(isset($_POST['last_time'])){
		$sql = "SELECT * FROM news WHERE date < '".$_POST['last_time']."' ORDER BY date DESC LIMIT 0, 3";
	}
	$resource = mysql_query($sql);
	$news = array();
	while($row = mysql_fetch_assoc($resource)){
		$news[] = $row;
	}
	mysql_close($link);
?>