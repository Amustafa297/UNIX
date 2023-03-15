<?php
//connecting to db
function set_url( $url )
{
    echo "<script>history.replaceState({},'','$url');</script>";
}

function sanitize($str, $length = 100)
{
  $str = trim($str);
  $str = htmlentities($str);
  return substr($str, 0, $length);
}

include('validations.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);
//start session
include('../../../dbConn.php');

$url = $_SERVER['REQUEST_URI'];

$url_components = parse_url($url);

// Use parse_str() function to parse the
// string passed via URL

if (!empty($url_components) && sizeof($url_components) > 1) {
	parse_str($url_components['query'], $params);
}
// Display result

if (!empty($params)) {
	if (!empty($params['uname'])) {
		$gottenName = $params['uname'];
	} else {
		echo "Please login sign up and log in on the home page to comment";
		//add here whatever fancier stuff
	}
}
echo $mysqli->error;

if ($mysqli) {
	if (sanitize(!empty($gottenName)) && sanitize(!empty($_GET['comment']))) {

		//prepare // where name is something (?)
		$prepSql = "INSERT into CommentsTable (username, comments) VALUES (?,?)";
		$stmt = $mysqli->prepare($prepSql);
		//bind parameter // one s because there is one ? (uname)
		$stmt->bind_param("ss", sanitize($gottenName), sanitize($_GET['comment']));
		//execute
		$stmt->execute();
		//close
		$stmt->close();
		echo $mysqli->error;

		$newURL = explode('?', $url)[0] . '?uname=' . $gottenName;
		set_url($newURL);
	}


	// reading from database and putting into records
	$res = $mysqli->query('SELECT username, comments FROM CommentsTable');
	if ($res) {
		while ($row = $res->fetch_assoc()) {
			$records[] = $row;
		}
	}
}

echo $mysqli->error;

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/style.css">
	<link rel="icon" href="media/groopLogo.png">
	<script src="https://kit.fontawesome.com/94284e611b.js" crossorigin="anonymous"></script>
	<title>Chat with us</title>
</head>

<body class="bodyOther" >
	<!-- HEADER -->


	<script defer src="header.js"></script>
	<header id="header"></header>

	
	<h1 class="otherTitles">CHAT WITH US</h1>

	<p style="font-size:20px; text-align:center;">Let us know what you think about our website :3
	<br />
	Don't forget to sign up and log in on the <a href="index.php" style="text-decoration:none; color: #2d7714;" onmouseover="this.style.color = 'gray'" onmouseout="this.style.color = '#2d7714'">homepage</a> to be able to leave a comment!</p>
	<br />

	<br />
	
	<div style="width: 24%; margin: auto; text-align:center;">
		<h1 style="margin-left: 10px;">What do you have to say?</h1>
		<br />
	<div>
		<ul style="margin-left: 100px; text-align: left;">
			<!-- adding li element -->
			<?php
			if (!empty($records)) {
				foreach ($records as $nextRow) {
					if (!empty($nextRow['comments'])) {
						echo "<li>" .  $nextRow['username'] . ": " . $nextRow['comments'] . " </li>";
					}
				}
			}
			?>
		</ul>
	
	</div>
	
	
	<form action="chatWithUs.php" method="get">
		<!--<div>
			First Name:
		</div>-->
		<?php
		if (!empty($gottenName)) {
			echo "<input type='hidden' name='uname' value=$gottenName />";
		}
		?>
		<div>
			<textarea style="margin-left: 10px; width: 430px; border: 2px solid #2d7714;" name="comment" placeholder="Voice your applauds and concerns"></textarea>
		</div>
		<br />
		<div>
			<input style="font-weight: 700; font-size:14px; text-align:center;" type="submit" value="LEAVE COMMENT" class="btn1 foot1" />
		</div>
	</form>
	</div>


	<!-- MAIN -->
	<main>
		<br><br> <br><br> <br><br> <br><br> <br><br>
		<br><br> <br><br> <br><br> <br><br> <br><br>
	</main>
	<!-- FOOTER -->
	<script defer src="footer.js"></script>
	<footer id="footer"></footer>

	<script src="assets/myScript.js"></script>

</body>

</html>