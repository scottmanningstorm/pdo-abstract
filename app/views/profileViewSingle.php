<h1 class ='center'> <?php echo $title ?> </h1>
<h2> Profile Tables </h2>
<table border='2' cellpadding="20"> 
	<tr> 
		<td> <h1>id </h1> </td> 
		<td> <h1>user_id</h1> </td>
		<td> <h1>Name </h1> </td>
		<td> <h1>Address</h1> </td>
		<td> <h1>Phone</h1> </td>
	</tr>
	<?php for ($i = 0; $i < count($id); $i++): ?> 
		<tr> 
			<td><?php echo $id; ?> </td> 
			<td><?php echo $user_id; ?> </td> 
		  	<td><?php echo $name; ?> </td>
		  	<td><?php echo $address; ?> </td>
		  	<td><?php echo $phone; ?> </td>
		<td>  
	  		<a href=<?php echo $edit_profile_link . '/' . $user_id;?> > Edit </a> <br /> 
		  	<a href=<?php echo $view_user_link . '/' . $user_id;?> > View User </a> <br /> 
		  	<a href=<?php echo $edit_user_link . '/' . $user_id;?> > Edit User </a> <br /> 
		</td> 
	    <form action='' method='post'> 
				<td> <button type='submit' name='delete_row'  value='<?php echo $id[$i]; ?>' > Delete  </button> </td>
			</form>	
		</tr>
	<?php endfor; ?> 
</table> 





 
