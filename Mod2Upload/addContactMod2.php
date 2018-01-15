<html>
		<head>
	<title>Find a record</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/custom.css" />
<link rel="stylesheet" href="themesMod2/rasmussenthemeroller.min.css" />
<link rel="stylesheet" href="themesMod2/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script src="javascript/storage.js"></script>
</head>
	<body>
		<div id="page" data-role="page" data-theme="b" >
	<div data-role="header" data-theme="b">
<h1>
	Update a record
		</h1>	</div>
				<div data-role="content">
	<?php
	include 'configMod2.php';
	include 'opendbMod2.php';

               $IDNumber = (isset($_POST['id'])    ? $_POST['id']   : '');
							 $AdditionalContactInfo = (isset($_POST['AdditionalContactInfo'])    ? $_POST['AdditionalContactInfo']   : '');

$sql= "	UPDATE mytable
				SET AdditionalContactInfo = '$AdditionalContactInfo'
				WHERE IDNumber = $id";
$result = mysqli_query($conn, $sql);

$sql= "	SELECT id, firstName, lastName, AdditionalContactInfo from mytable WHERE id = $IDNumber";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
				echo "<b>IDNumber: " . $row["id"]. "</b><br>";
        echo "<b>Name: " . $row["firstName"]. " " . $row["lastName"]. "</b><br>";
				echo "<b>AdditionalContactInfo: " . $row["AdditionalContactInfo"]. "</b><br><hr>";
    }
} else {
    echo "Sorry there are no matches! Please check your entry and try again.";
}

mysqli_close($conn);

?>



				<div data-role="footer" data-theme="b">
	  <h4>YOUR APP NAME &copy; 2016</h4>
	</div>
	</body>
</html>
