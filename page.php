<?php require_once('Connections/achizitii.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_linie = 10;
$pageNum_linie = 0;
if (isset($_GET['pageNum_linie'])) {
  $pageNum_linie = $_GET['pageNum_linie'];
}
$startRow_linie = $pageNum_linie * $maxRows_linie;

mysql_select_db($database_achizitii, $achizitii);
$query_linie = "SELECT * FROM liniedebudget";
$query_limit_linie = sprintf("%s LIMIT %d, %d", $query_linie, $startRow_linie, $maxRows_linie);
$linie = mysql_query($query_limit_linie, $achizitii) or die(mysql_error());
$row_linie = mysql_fetch_assoc($linie);

if (isset($_GET['totalRows_linie'])) {
  $totalRows_linie = $_GET['totalRows_linie'];
} else {
  $all_linie = mysql_query($query_linie);
  $totalRows_linie = mysql_num_rows($all_linie);
}
$totalPages_linie = ceil($totalRows_linie/$maxRows_linie)-1;

$maxRows_operatie = 10;
$pageNum_operatie = 0;
if (isset($_GET['pageNum_operatie'])) {
  $pageNum_operatie = $_GET['pageNum_operatie'];
}
$startRow_operatie = $pageNum_operatie * $maxRows_operatie;

mysql_select_db($database_achizitii, $achizitii);
$query_operatie = "SELECT * FROM operatiune";
$query_limit_operatie = sprintf("%s LIMIT %d, %d", $query_operatie, $startRow_operatie, $maxRows_operatie);
$operatie = mysql_query($query_limit_operatie, $achizitii) or die(mysql_error());
$row_operatie = mysql_fetch_assoc($operatie);

if (isset($_GET['totalRows_operatie'])) {
  $totalRows_operatie = $_GET['totalRows_operatie'];
} else {
  $all_operatie = mysql_query($query_operatie);
  $totalRows_operatie = mysql_num_rows($all_operatie);
}
$totalPages_operatie = ceil($totalRows_operatie/$maxRows_operatie)-1;

$maxRows_user = 10;
$pageNum_user = 0;
if (isset($_GET['pageNum_user'])) {
  $pageNum_user = $_GET['pageNum_user'];
}
$startRow_user = $pageNum_user * $maxRows_user;

mysql_select_db($database_achizitii, $achizitii);
$query_user = "SELECT * FROM `user`";
$query_limit_user = sprintf("%s LIMIT %d, %d", $query_user, $startRow_user, $maxRows_user);
$user = mysql_query($query_limit_user, $achizitii) or die(mysql_error());
$row_user = mysql_fetch_assoc($user);

if (isset($_GET['totalRows_user'])) {
  $totalRows_user = $_GET['totalRows_user'];
} else {
  $all_user = mysql_query($query_user);
  $totalRows_user = mysql_num_rows($all_user);
}
$totalPages_user = ceil($totalRows_user/$maxRows_user)-1;
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form name="form1" method="post" action="">
	<?php $_SESSION['MM_Role']>
  
</form>
</body>
</html>
<?php
mysql_free_result($linie);

mysql_free_result($operatie);

mysql_free_result($user);
?>
