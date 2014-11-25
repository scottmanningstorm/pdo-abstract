
<h1 class ='center'> <?php echo $title ?> </h1>
<h2> User Tables </h2>
<table border='2' cellpadding="20"> 
	<tr> 
		<td> <h1>id </h1> </td> 
		<td> <h1>Username</h1> </td>
		<td> <h1>Password </h1> </td>
		<td> <h1>Timestamp</h1> </td>
	</tr>
	<?php for ($i = 0; $i < count($username); $i++): ?> 
		<tr> 
			<td><?php echo $id[$i]; ?> </td> 
		  	<td><?php echo $username[$i]; ?> </td>
		  	<td><?php echo $password[$i]; ?> </td>
		  	<td><?php echo $timestamp[$i]; ?> </td>
		<td>  
	  		<a href=<?php echo $edit_user_link . '/' . $id[$i];?> > Edit </a> <br /> 
		  	<a href=<?php echo $view_profile_link . '/' . $id[$i];?> > View Profile </a> <br /> 
		  	<a href=<?php echo $edit_profile_link . '/' . $id[$i];?> > Edit Profile </a> <br /> 
		</td> 
	    <form action='' method='post'> 
			<td> <button type='submit' name='delete_row'  value='<?php echo $id[$i]; ?>' > Delete  </button> </td>
		</form>	
		</tr>
	<?php endfor; ?> 
</table> 





 


 	