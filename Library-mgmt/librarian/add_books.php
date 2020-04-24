 <?php
session_start();
if(!isset($_SESSION["librarian"]))
{
	?>
	<script type="text/javascript">
				window.location="login.php";
				</script>
				<?php
}
include "connection.php";
include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
               
                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add Books Info</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
							<form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
							<table class="table table-bordered">
							<tr>
							<td><input type="text" class="form-control" placeholder="Books Name" name="bookname" required=""></td>
							</tr>
							
							
							<tr>
							<td><input type="text" class="form-control" placeholder="Books Author Name" name="bookauthorname" required=""></td>
							</tr>
							<tr>
							<td><input type="text" class="form-control" placeholder="Books Publication Name" name="bookpublicationname" required=""></td>
							</tr>							
							<tr>
							<td><input type="text" class="form-control" placeholder="Books Purchase Date" name="bookpurchasedate" required=""></td>
							</tr>							
							<tr>
							<td><input type="text" class="form-control" placeholder="Books Price" name="bookprice" required=""></td>
							</tr>							
							<tr>
							<td><input type="text" class="form-control" placeholder="Books Quantity" name="bookqty" required=""></td>
							</tr>							
							<tr>
							<td><input type="text" class="form-control" placeholder="Books Available Quantity" name="bookavailqty" required=""></td>
							</tr>	
							<tr>
							<td>books image<input type="file" name="f1"  required=""></td>
							</tr>
							<tr>
							<td><input type="submit" name="submit1" class="btn btn-default submit" value="insert books data"></td>
							 </tr>	
														 
							</table>
							</form> 
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
<?php
if(isset($_POST["submit1"]))
{
	$tm=md5(time());
	$fnm=$_FILES["f 1"]["name"];
	$dst="./book_image/".$tm.$fnm;
	$dst1="book_image/".$tm.$fnm;
	move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);
	mysqli_query($link,"insert into add_books values('','$_POST[bookname]','$_POST[bookauthorname]','$_POST[bookpublicationname]','$_POST[bookpurchasedate]','$_POST[bookprice]','$_POST[bookqty]','$_POST[bookavailqty]','$_SESSION[librarian]','$dst1')");
	
	?>
	<script type="text/javascript">
	alert("Books Inserted Successsfully");
	</script>
	<?php
}
?>
<?php
if(isset($_POST["submit1"]))
{
	
}
?>

<?php
include "footer.php"; 
?>