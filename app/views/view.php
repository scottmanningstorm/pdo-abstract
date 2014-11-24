

<h1 class ='center'> <?php echo $title ?> </h1>
<p class ='center'> <?php echo $page_info ?> </p>

<p> <?php  echo 'Database table = ' . $table; ?>  </p>


<table border='2' cellpadding="20"> 
	<tr> 
		<td> <h1> id </h1> </td> 
		<td> <h1>Username</h1> </td>
		<td> <h1>Password </h1> </td>
		<td> <h1>Timestamp</h1> </td>
	</tr>
			<?php for ($i = 0; $i < count($id); $i++): ?> 
			<tr> 
			  <td><?php echo $id[$i]; ?> </td> 
			  <td><?php echo $username[$i]; ?> </td>
			  <td><?php echo $password[$i]; ?> </td>
			  <td><?php echo $timestamp[$i]; ?> </td>
			  <td><?php echo $root_path; ?> <a href=<?php echo $edit_user_link . '/' . $id[$i];?> > Edit </a> </td>
			  <td><a href=<?php echo $delete_link . '/' . $id[$i]; ?> > Delete </a> </td>
			</tr>  
			<?php endfor; ?> 
</table> 

 
 	