<div id="banner" style="background-image: url(img/banner_news.jpg);">
  <div>
    <span>News</span><br />
    Latest activity in the Catrobat project
  </div>
</div>

<div class="content bottom-padding">

  <br />&nbsp;<br />
    
  <?php
	$mysqli = new mysqli("localhost", "catrobat", "catrobat0815", "catrobat");
	if ($result = $mysqli->query("SELECT * FROM `news` ORDER BY date DESC")) {
		for ($i = 0; $i < $result->num_rows; $i++) {
			$data = $result->fetch_array();
			?>
      <a class="anchor" name="<?=($result->num_rows - $i)?>" id="<?=($result->num_rows - $i)?>"></a>
      <div class="flex-container-h news">
        <div style="order: <?=($i % 2)?>"><img src="img/news/<?=$data["image"]?>" alt="News-Image" /></div>
        <div class="expandable">
          <h2><?=$data["headline"]?></h2>
          <span><?=date("F j, Y", strtotime($data["date"]))?></span><br />
          <p><?=$data["text"]?></p>
          <?php if ($data["link"] != "") { ?>
          <a class="button" href="<?=$data["link"]?>" target="_blank">Visit</a>
          <?php } ?>
        </div>
      </div>
      <hr />
      <?php
		}
		$result->close();
	}
	$mysqli->close();
	?>

</div>
