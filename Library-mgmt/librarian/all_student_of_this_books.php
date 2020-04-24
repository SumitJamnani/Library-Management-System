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
                                <h2>Student list with this book</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php
								$res=mysqli_query($link,"select * from issue_books where books_name='$_GET[books_name]' && books_return_date=''");
								echo "<table class='table table-bordered'>";
								echo "<tr>";
								echo "<th>"; echo "Student Name"; echo "</th>";
								echo "<th>"; echo "Student enrollment"; echo "</th>";
								echo "<th>"; echo "Books Name"; echo "</th>";
								echo "<th>"; echo "Student Email"; echo "</th>";
								echo "<th>"; echo "Student Contact"; echo "</th>";
								echo "<th>"; echo "Student Books Issue Date"; echo "</th>";
								echo "</tr>";
								
								while($row=mysqli_fetch_array($res))
								{
									echo "<tr>";
									echo "<td>"; echo $row["student_name"]; echo "</td>";
									echo "<td>"; echo $row["student_enrollment"]; echo "</td>";
									echo "<td>"; echo $row["books_name"]; echo "</td>";
									echo "<td>"; echo $row["student_email"]; echo "</td>";
									echo "<td>"; echo $row["student_contact"]; echo "</td>";
									echo "<td>"; echo $row["books_issue_date"]; echo "</td>";
									echo "</tr>";
								}
								echo "</table>";
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