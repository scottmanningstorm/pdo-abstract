<h1 style='text-align:center; color:blue'> <?php echo $title ?> </h1>
<!--Show all data from USER Table --> 
<h2> User Tables </h2>
<table border='2' cellpadding="20"> 
	<tr> 
		<td> <h1>id </h1> </td> 
		<td> <h1>UserName</h1> </td>
		<td> <h1>Password </h1> </td>
		<td> <h1>Time Stamp</h1> </td>
	</tr>
	<?php for ($i = 0; $i < count($id); $i++): ?> 
		<tr> 
			<td><?php echo $id; ?> </td> 
			<td><?php echo $username; ?> </td> 
		  	<td><?php echo $password; ?> </td>
		  	<td><?php echo $time_stamp; ?> </td>
		<td>  
	  		<a href=<?php echo $edit_user_table_link . '/' . $id;?> > Edit this table </a> <br /> 
		</td> 
	    <form action='' method='post'> 
			<td> <button type='submit' name='delete_row'  value='<?php echo $id; ?>' > Delete  </button> </td>
		</form>	
		</tr>
	<?php endfor; ?> 
</table> 
<!--Show all data from PROFILE Table -->
<h2 > Profile Tables </h2>
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
			<td><?php echo $profile_id; ?> </td> 
			<td><?php echo $id; ?> </td> 
		  	<td><?php echo $name; ?> </td>
		  	<td><?php echo $address; ?> </td>
		  	<td><?php echo $phone; ?> </td>
		<td>  
	  		<a href=<?php echo $edit_profile_table_link . '/' . $id;?> > Edit this table </a> <br /> 
		</td> 
	    <form action='' method='post'> 
			<td> <button type='submit' name='delete_row'  value='<?php echo $d; ?>' > Delete  </button> </td>
		</form>	
		</tr>
	<?php endfor; ?> 
</table> 