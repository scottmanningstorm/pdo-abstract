<h1 class ='center'> <?php echo $title ?> </h1>
<p class ='center'> <?php echo $page_info ?> </p>

<table border='2' cellpadding="20"> 
	<tr> 
		<td> <h1> Profile id </h1> </td> 
		<td> <h1>Name</h1> </td>
		<td> <h1>Address </h1> </td>
		<td> <h1>Phone </h1> </td>
	</tr>
			<?php for ($i = 0; $i < count($profile_id); $i++): ?> 
			<tr> 
			  <td><?php echo $profile_id[$i]; ?> </td> 
			  <td><?php echo $name[$i]; ?> </td>
			  <td><?php echo $address[$i]; ?> </td>
			    <td><?php echo $phone[$i]; ?> </td>
			</tr>  
			<?php endfor; ?> 
</table> 

