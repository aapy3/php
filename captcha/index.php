<?php
session_start();
function rand_string( $length ) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	

	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
		@$str .= $chars[ rand( 0, $size - 1 ) ];
	}
	return $str;
}

if(!isset($_POST['cap'])&&!isset($_POST['cc']))
{
$_SESSION['secure']= rand_string(5);
}
else
{
if($_SESSION['secure'] == $_POST['cap'])
{
echo "WELCOME";
echo $_POST['cc'];
}
else
{
echo "TRY AGAIn<br>";
$_SESSION['secure']= rand_string(5);
}
}



?>
<img src="captcha.php"/>

<form method="POST" action"">
<a href="?reload=yes"><img src="relod.png" width="20" height="20"></a><br><br>
<input type="text" name="cc" value="<?php
if(isset($_GET['reload'])&&!empty($_POST['cc']))
echo "az";
{
if($_GET['reload']='yes'&&!empty($_POST['cc']))
{

echo $_POST['cc'];}
}
?>">
ENTER VALUE <input type="captcha" name="cap">
<br><br>

<input type="SUBMIT" value="SUBMIT">
</form>







