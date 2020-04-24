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
                                <h2>Issue Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                               
							   <form name="form1" action="" method="post">
								<table>
									<tr>
										<td>
											<select name="enr" class="form-control selectpicker">
												<?php
												$res=mysqli_query($link,"select enrollment from student_registration");
												while($row=mysqli_fetch_array($res))
												{
													echo "<option>";
													echo $row["enrollment"];
													echo "</option>";
												}
												?>
											</select>
										</td>
										<td>
											<input type="submit" value="search" name="submit1" 
											class="form-control btn btn-default" style="margin-top:5px;">
										</td>
									</tr>
								</table>
							   
							   
							   <?php
							   if(isset($_POST["submit1"]))
							   {
								   $res5=mysqli_query($link,"select * from student_registration where enrollment='$_POST[enr]'");
								   while($row5=mysqli_fetch_array($res5))
								   {
									   $firstname=$row5["firstname"];
									   $lastname=$row5["lastname"];
									   $username=$row5["username"];
									   $email=$row5["email"];
									   $contact=$row5["contact"];
									   $sem=$row5["sem"];
									   $enrollment=$row5["enrollment"];
									   $_SESSION["enrollment"]=$enrollment;
									   $_SESSION["username"]=$username;
								   }
								   
								   ?>
								   <table class="table table-bordered">
							<tr>
							<td><input type="text" class="form-control" placeholder="Enrollment No" name="enrollment" value="<?php echo $enrollment; ?>" disabled></td>
							</tr>
							<tr>
							<td><input type="text" class="form-control" placeholder="Student Name" name="studentname" value="<?php echo $firstname.' '.$lastname; ?>" required=""></td>
							</tr>
							<tr>
							<td><input type="text" class="form-control" placeholder="Student Sem" name="studentsem" value="<?php echo $sem; ?>" required=""></td>
							</tr>
							<tr>
							<td><input type="text" class="form-control" placeholder="Student Contact" name="studentcontact" value="<?php echo $contact; ?>" required=""></td>
							</tr>
							<tr>
							<td><input type="text" class="form-control" placeholder="Student Email" name="studentemail" value="<?php echo $email; ?>" required=""></td>
							</tr>
							<tr>
							<td>
								<select name="booksname" class="form-control selectpicker">
								<?php
								$res=mysqli_query($link,"select books_name from add_books");
								while($row=mysqli_fetch_array($res))
								{
									echo "<option>";
									echo $row["books_name"];
									echo "</option>";
								}
								?>
								
								</select>
							</td>
							</tr>
							
							<tr>
							<td><input type="text" class="form-control" placeholder="Book Issue Date" name="bookissuedate" value="<?php echo date("y-m-d"); ?>" required=""></td>
							</tr>
							<tr>
							<td><input type="text" class="form-control" placeholder="Student Username" name="studentusername" value="<?php echo $username; ?>" disabled></td>
							</tr>
							<tr>
							<td><input type="submit" value="issue books" name="submit2" class="form-control btn btn-default"></td>
							</tr>
								   </table>
								   <?php
							   }
							   
							   ?>
							   
							 </form>  
							 
							 <?php
							 if(isset($_POST["submit2"]))
							 {
								 $qty=0;
								 $res=mysqli_query($link,"select * from add_books where books_name='$_POST[booksname]'");
								 while($row=mysqli_fetch_array($res))
								 {
									 $qty=$row["avail_qty"];
								 }
								 if($qty==0)
								 {
									?>

									<div class="alert alert-danger col-lg-6 col-lg-push-3">
									<strong style="...">Thie books are not avilable in stock.</strong>
									</div>	
									<?php									
								 }
								 else
								 {
								 
								 mysqli_query($link,"insert into issue_books values('','$_SESSION[enrollment]','$_POST[studentname]','$_POST[studentsem]','$_POST[studentcontact]','$_POST[studentemail]','$_POST[booksname]','$_POST[bookissuedate]','','$_SESSION[username]')");
								 mysqli_query($link,"update add_books set avail_qty=avail_qty-1 where books_name='$_POST[booksname]'");
								 
								 
								 ?>
								 <script type="text/javascript">
								 alert("Books issued Successfully");
								 window.location.href=window.location.href;
								 
								 </script>
								 <?php
								 }
								 
								 
							 }
							 ?>
							   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
include "footer.php"; 
?>