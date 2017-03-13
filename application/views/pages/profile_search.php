
<?php echo form_open('search'); ?>

	<select name = "fields" >
		<option value="firstname">First name</option>
		<option value="lastname">Last name</option>
		<option value="email">Email address</option>
		<option value="city">Location: city</option>
	
	</select>

	<input type="text" name="search" placeholder="Type to search..." size="50"> 
	
	<input type="submit" value="submit">

<?php if(isset($query)) { ?>
<table>
	<?php foreach($query as $q){ ?>
	<tr>	
		<td> <?php echo ' __ '; echo $q->firstname; ?></td>
		<td> <?php echo ' __ '; echo $q->lastname; ?></td>
		<td> <?php echo ' __ '; echo $q->email; ?></td>
		<td> <?php echo ' __ '; echo $q->city; ?></td>
		<td>__<a href=" <?php echo base_url() ; echo "index.php/find_profile/"; echo $q->username; ?>"> Profile</a></td>
	</tr>
	<div>
	</div>
	<?php } ?>
</table>
<?php } ?>
<?php echo form_close(); ?>
