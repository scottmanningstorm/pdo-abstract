
<h1 class ='center'> <?php echo $title ?> </h1>



<table border='2' cellpadding="20"> 
	<tr> 
		<td> <h1> id </h1> </td> 
		<td> <h1>Username</h1> </td>
		<td> <h1>Password </h1> </td>
		<td> <h1>Timestamp</h1> </td>
	</tr>
		<form action="" method="post">
			<tr> 
			  <td> <input type='text' name='id' value=<?php echo $row['id']; ?> > </td> 
			  <td> <input type='text' name='username' value=<?php echo $row['username']; ?> > </td> 
			  <td> <input type='text' name='password'value=<?php echo $row['password']; ?> > </td> 
			  <td> <p> <?php echo $row['created_at']; ?> </p> </td>  
			  <td> <input type="submit" value="Submit"> </td> 
			</tr>    
		</form>

</table> 



 	