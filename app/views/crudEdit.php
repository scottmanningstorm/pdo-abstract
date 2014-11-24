
<h1 class ='center'> <?php echo $title ?> </h1>


<h2> User Table </h2>
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
			  <td> <input type='text' name='username' value=<?php echo "'" . $row['username'] . "'"; ?> > </td> 
			  <td> <input type='text' name='password' value=<?php echo "'" . $row['password'] . "'"; ?> > </td> 
			  <td> <p> <?php echo $row['created_at']; ?> </p> </td> 
			</tr>    
	</form>
 

<br /> <br ><br /> <br />
<h2> Profile table </h2>

	<tr> 
		<td> <h1> Profile id </h1> </td> 
		<td> <h1> User id </h1> </td>
		<td> <h1> Name </h1> </td>
		<td> <h1> Address </h1> </td>
		<td> <h1> Phone </h1> </td>
	</tr>	
			 
	<tr> 
	  <td> <input type='text' name='profile_id' value=<?php echo "'" . $profile_id[0] . "'"; ?> ></td> 
		  <td> <input type='text' name='user_id' value=<?php echo "'" .$id[0]. "'" ?> > </td> 
  		  <td> <input type='text' name='name' value=<?php echo "'" .$name[0]. "'" ?> > </td> 
  	  	  <td> <input type='text' name='address' value=<?php echo "'" .$address[0]. "'" ?> > </td> 
  	  	   <td> <input type='text' name='phone' value=<?php echo "'" .$phone[0] . "'" ?> > </td> 
	</tr> <td> <input type="submit" value="Submit"> </td>  
		
</table> 



 	