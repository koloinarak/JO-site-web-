<?php
function connex($base,$param)
{
	include($param.".inc.php");
	$idcom=mysqli_connect(MYHOST,MYUSER,MYPASS,$base);
	if(!$idcom)
	{
    echo "<script type=text/javascript>";
		echo "alert('Connexion Impossible &agrave; la base  $base')</script>";
	}
	return $idcom;
}
?>