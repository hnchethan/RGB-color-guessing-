<?php 
$conn=mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("test") or die("Cannot connect to database");
if(isset($_POST['insert']))
{
	$file=addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$query="INSERT INTO tbl_images(name) VALUES ('$file')";
	if(mysql_query($query))
	{
		echo "<script>alert("IMAGE inserted into database");</script>";	
	}
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>testing</title>
</head>
<body>
<h1>Insert</h1>
<form method="post" enctype="multipart/form-data">
	<input type="file" name="image" id="image"/>
	<br>
	<input type="submit" name="insert" value="Insert">

</form>
<br>
<br>
<table class="table table-bordered">
	<tr>
		<th>Image</th>
	</tr>
	<?php
		$query="SELECT * from tbl_images ORDER BY id DESC";
		$result=mysql_query($connect,$query);
		while($row=mysql_fetch_array($result))
		{
			echo '<tr><td><image/jpeg;base64,'.base64_encode($row['name']).'"/>
		}
  

     ?>
</table>



</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#insert').click(function(){
			vaar image_name=$('image').val();
			if(image_name==' ')
			{
				alert("select image0");
				return false;

			}
			else
			{
				var extension=$('#image').val().split('.').pop().toLowerCase();
				if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])==-1)
				{
					alert("invalid image");
					$('image').val(' ');
					return false;
				}
			}
		});
	});




</script>