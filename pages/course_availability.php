<?php
$dbuser="root";
$dbpass="";
$host="localhost";
$dbname = "gesionclub";
$mysqli = new mysqli($host, $dbuser, $dbpass, $dbname);
if(!empty($_POST['title'])){
$cshort=$_POST['title'];
$result ="SELECT count(*) FROM projet WHERE title=?";
$stmt = $mysqli->prepare($result);
$stmt->bind_param('s',$title);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
if($count>0)
	echo "<span style='color:red'> Course Short Name Already Exist .</span>";
}
if(!empty($_POST['title1'])){
$cshort=$_POST['title1'];
$result ="SELECT count(*) FROM  projet WHERE title=?";
$stmt = $mysqli->prepare($result);
$stmt->bind_param('i',$title);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
if($count>0)
	echo "<span style='color:red'> Course Short Name Already Exist .</span>";
}

if(!empty($_POST['cfull'])){
	$cfull=$_POST['cfull'];
	$result ="SELECT count(*) FROM tbl_course WHERE cfull=?";
	$stmt = $mysqli->prepare($result);
	$stmt->bind_param('s',$cfull);
	$stmt->execute();
	$stmt->bind_result($count);
	$stmt->fetch();
	$stmt->close();
	if($count>0)
		echo "<span style='color:red'> Course Full Name Already Exist .</span>";
}

if(!empty($_POST['cfull1'])){
	$cfull=$_POST['cfull1'];
	$result ="SELECT count(*) FROM subject WHERE cfull=?";
	$stmt = $mysqli->prepare($result);
	$stmt->bind_param('s',$cfull);
	$stmt->execute();
	$stmt->bind_result($count);
	$stmt->fetch();
	$stmt->close();
	if($count>0)
		echo "<span style='color:red'> Course Full Name Already Exist .</span>";
}
?>

