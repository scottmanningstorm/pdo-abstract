
<h1 class ='center'> <?php echo $title ?> </h1>
<p class ='center'> <?php echo $page_info ?> </p>

<p> <?php  echo 'Database table = ' . $table; ?>  </p>


<table border='2' cellpadding="20"> 
	<form action='' method='post'> 
		<button type='submit' name='insert'  value='sdfsdf'> Insert New Record </button> 
	</form>
	<tr> 
		<td> <h1> id </h1> </td> 
		<td> <h1>Username</h1> </td>
		<td> <h1>Password </h1> </td>
		<td> <h1>Timestamp</h1> </td>
	</tr>

<!-- PROFILE LOOP TEST --> 
		<?php /* for ($i = 0; $i < count($id); $i++): ?> 
			<tr> 
			  <td><?php echo $profile_id[$i]; ?> </td> 
			  <td><?php echo $name[$i]; ?> </td>
			  <td><?php echo $address[$i]; ?> </td>
			  <td><?php echo $phone[$i]; ?> </td>
			</tr>  <?php endfor; */ ?> 
<!-- PROFILE LOOP END TEST --> 


			<?php for ($i = 0; $i < count($id); $i++): ?> 
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
			  	<td> <button type='submit' name='delete_row'  value=<?php echo $id[$i]; ?>  > Delete  </button>  </td>
			  </form>
			</tr>  <?php endfor; ?> 
</table> 




 	