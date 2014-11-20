<style> 
	.center {text-align:center;} 
</style>


<h1 class ='center'> <?php echo $title ?> </h1>
<p class ='center'> <?php echo $page_info ?> </p>

<p> <?php  echo 'Database table = ' .$table; ?>  </p>


<table border='2' cellpadding="20"> 
	<tr> 
		<td> <h1> id </h1> </td> 
		<td> <h1>Username</h1> </td>
		<td> <h1>Password </h1> </td>
		<td> <h1>Timestamp</h1> </td>
	</tr>
	
	<tr> 
		
	</tr>
	<tr>
		
	</tr>
	<tr> 
		
	</tr>

</table> 


<?php
	


	foreach ($results as $row => $value) {
		echo $value['id'] . '<br />'; 
	} 
  	

?>  



 	