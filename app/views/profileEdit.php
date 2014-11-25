
<h1 class ='center'> <?php echo $title ?> </h1>


<h2> Edit Profile Table </h2>
<table border='2' cellpadding="20"> 
	<tr> 
		<td> <h1> id </h1> </td> 
		<td> <h1>User id </h1> </td> 
		<td> <h1>Name</h1> </td>
		<td> <h1>Address </h1> </td>
		<td> <h1>Phone</h1> </td>
	</tr>
		<form action="" method="post">
		<tr> 
		  <td> <input type='text' name='profile_id' value='<?php echo $profile_id;?>'> </td> 
			  <td> <input type='text' name='user_id' value='<?php echo $user_id	;?>'> </td> 
	  		  <td> <input type='text' name='name' value='<?php echo $name;?>'> </td> 
	  	  	  <td> <input type='text' name='address' value='<?php echo $address;?>' > </td> 
	  	  	  <td> <input type='text' name='phone' value='<?php echo $phone;?>'> </td> 
			</tr> 
			<td> <input type="submit" value="Submit"> </td>  
		</form>
</table> 



 	