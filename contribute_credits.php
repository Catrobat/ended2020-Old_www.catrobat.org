<div id="banner" style="background-image: url(img/banner_contribute.jpg);">
  <div>
    <span>Contribute</span><br />
    Be part of an ever growing project
  </div>
</div>

<div class="content bottom-padding max-width">

  <h1>Credits</h1>
  <h3>The Catrobat team includes:</h3>
  <?php 
	$credentials = file("credentials.txt");
	$mysqli = new mysqli("localhost", trim($credentials[0]), trim($credentials[1]), trim($credentials[2]));
	if ($result = $mysqli->query("SELECT name FROM `credits` ORDER BY name ASC")) {
		for ($i = 0; $i < $result->num_rows; $i++) {
			$data = $result->fetch_array();
			echo(htmlentities($data["name"], ENT_COMPAT,'ISO-8859-1', true) . (($i < $result->num_rows - 2) ? ", " : (($i == $result->num_rows - 1) ? "." : " and ")));
		}
		$result->close();
	} else {
		echo($mysqli->error);
	}

  $mysqli->close();
	?>
</div>
