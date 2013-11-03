<?php

/*
		Author: Iwebux
		Description: configure db connection
		Copyright: iwebux.com
*/

define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','kk1412');
define('DBNAME','nufa');

$conn = mysql_connect(DBHOST,DBUSER,DBPASS);
	
mysql_select_db(DBNAME,$conn);

/*Check for data from the browser*/

if(isset($_POST['value'])) {
	$field = $_POST['field'];
	$value = $_POST['value'];
	$id = $_POST['id'];
	echo "field : $field<br />";
	echo "value : $value<br />";
	echo "id : $id<br />";
	$sql = "update city set ".$field." = '".$value."' where id_city = ".$id;
	
	mysql_query($sql) or die($sql);
}
else {
	echo "tidak ada <br />";
}

/*Retrieve records from db*/
function get_data()
{
	
	$sql = "select * from city";
	
	$rs = mysql_query($sql);
	
	return $rs;
}
/*Update records in db*/
function update_data($field, $data, $rownum)
{

	echo "bankai";
	$sql = "update city set ".$field." = '".$data."' where id = ".$rownum;
	
	mysql_query($sql) or die("Couldn't connect to db");
	
	
}

?>