<?php
include "connection.php";
$id=$_GET["id"];
$a=date("Y-m-d");
$res=mysqli_query($link,"update issue_books set books_return_date='$a' where id=$id");

$books_name="";
$res=mysqli_query($link,"select * from issue_books where id=$id");
while($row=mysqli_fetch_array($res))
{
	$books_name=$row["books_name"];
}

mysqli_query($link,"update add_books set avail_qty=avail_qty+1 where books_name='$books_name'");

?>

<script type="text/javascript">
window.location="return_books.php";
</script>