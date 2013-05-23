<article>
	
	<table>
		<tr>
			<th>Name</th>
			<th>Age</th>
			<th>Gender</th>
		</tr>
		
		<?php 
		foreach ($data as $variable=>$value)
		{
			echo "<br />" .$value;
		}
		?>
	</table>
</article>