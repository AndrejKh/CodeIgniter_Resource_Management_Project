
<?php echo form_open('allocation'); ?>
<?php if(isset($query)) { 

?>

<table>
	<?php foreach($query as $q){ ?>
	<tr>	
		<td> FIRSTNAME</td>
		<td> LASTNAME </td>
		<td> EMAIL </td>
	</tr>
	<tr>		

		<td> <?php echo ' __ '; echo $q[0]['firstname'];  ?> </td>
		<td> <?php echo ' __ '; echo $q[0]['lastname'];  ?></td>
		<td> <?php echo ' __ '; echo $q[0]['email'];  ?></td>
	</tr>
	<?php } ?>
</table>
<?php } ?>
<?php echo form_close(); ?>