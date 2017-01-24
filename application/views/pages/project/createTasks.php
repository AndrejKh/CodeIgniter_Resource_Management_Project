    <?php echo validation_errors(); ?> 
    <?php echo form_open('create_tasks'); ?>
			<div class="jumbotron container">
				<label for="task[0][title]">* Task title:</label>
				<input type="text" class="form-control" name="task[0][title]">
				<label for="task[0][startDate]">* Start Date:</label>
				<input type="date" class="form-control" name="task[0][startDate]">
				<label for="task[0][endDate]">* End Date:</label>
				<input type="date" class="form-control" name="task[0][endDate]">
				<br>
				<div class="jumbotron container" style="background-color:#008; color:white;">
					<div >
						<label for="task[0][role][0][name]">* Role Name:</label>
						<input type="text" class="form-control" name="task[0][role][0][name]">
						<label for="task[0][role][0][name]">* Role Number of People:</label>
						<input type="text" class="form-control" name="task[0][role][0][numPeople]">
						<div class="container">
							<label for="task[0][role][2][skill][skillID]">* Skill ID:</label>
							<input type="text" class="form-control" name="task[0][role][0][skill][0][skillID]">
							<label for="task[0][role][2][skill][skillID]">* Skill Level:</label>
							<input type="text" class="form-control" name="task[0][role][0][skill][0][skillLevel]">
						</div>
					</div>
					<div class="container">
						<label for="task[0][role][0][name]">* Role Name:</label>
						<input type="text" class="form-control" name="task[0][role][1][name]">
						<label for="task[0][role][0][name]">* Role Number of People:</label>
						<input type="text" class="form-control" name="task[0][role][1][numPeople]">
						<div class="container">
							<label for="task[0][role][2][skill][skillID]">* Skill ID:</label>
							<input type="text" class="form-control" name="task[0][role][1][skill][0][skillID]">
							<label for="task[0][role][2][skill][skillID]">* Skill Level:</label>
							<input type="text" class="form-control" name="task[0][role][1][skill][0][skillLevel]">
						</div>
					</div>
					<div class="container form-group">
						<label for="task[0][role][0][name]">* Role Name:</label>
						<input type="text" class="form-control" name="task[0][role][2][name]">
						<label for="task[0][role][0][name]">* Role Number of People:</label>
						<input type="text" class="form-control" name="task[0][role][2][numPeople]">
						<div class="container">
							<label for="task[0][role][2][skill][skillID]">* Skill ID:</label>
							<input type="text" class="form-control" name="task[0][role][2][skill][0][skillID]">
							<label for="task[0][role][2][skill][skillID]">* Skill Level:</label>
							<input type="text" class="form-control" name="task[0][role][2][skill][0][skillLevel]">
						</div>
					</div>
				</div>
				<br>
				<label for="task[1][title]">* Task title:</label>
				<input type="text" class="form-control" name="task[1][title]">
				<label for="task[1][startDate]">* Start Date:</label>
				<input type="text" class="form-control" name="task[1][startDate]">
				<label for="task[1][endDate]">* End Date:</label>
				<input type="text" class="form-control" name="task[1][endDate]">
				<br>
				<div >
						<label for="task[1][role][0][name]">* Role Name:</label>
						<input type="text" class="form-control" name="task[1][role][0][name]">
						<label for="task[1][role][0][name]">* Role Number of People:</label>
						<input type="text" class="form-control" name="task[1][role][0][numPeople]">
						<div class="container">
							<label for="task[0][role][2][skill][skillID]">* Skill ID:</label>
							<input type="text" class="form-control" name="task[1][role][0][skill][0][skillID]">
							<label for="task[0][role][2][skill][skillID]">* Skill Level:</label>
							<input type="text" class="form-control" name="task[1][role][0][skill][0][skillLevel]">
						</div>
					</div>
			</div>
            <br>
			<button type="submit" class="btn btn-success btn-lg">Go Forward</button>

</form>
