
<h1 class ='center'> <?php echo $title ?> </h1>


<h2> User Table USER EDIT </h2>
<table border='2' cellpadding="20"> 
	<tr> 
		<td> <h1>id </h1> </td> 
		<td> <h1>Username</h1> </td>
		<td> <h1>Password </h1> </td>
		<td> <h1>Timestamp</h1> </td>
	</tr>
		<form action="" method="post">
			<tr> 
			  <td> <input type='text' name='id' value="<?php echo $id; ?>" > </td> 
			  <td> <input type='text' name='username' value="<?php echo  $username ; ?>" > </td> 
			  <td> <input type='text' name='password' value="<?php echo $password; ?>" > </td> 
			  <td> <p> <?php echo $timestamp; ?> </p> </td> 
			</tr>    
			<td> <input type="submit" value="Submit"> </td>  
	</form>
</table> 



 	