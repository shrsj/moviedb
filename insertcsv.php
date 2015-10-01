<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Import Excel To Mysql Database Using PHP </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">


	</head>
	<body>    
			<form class="form-horizontal well" action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">
				<fieldset>
					<legend>Import CSV/Excel file</legend>
					<div class="control-group">
						<div class="control-label">
							<label>CSV/Excel File:</label>
						</div>
						<div class="controls">
							<input type="file" name="file" id="file" class="input-large">
						</div>
					</div>
						
					<div class="control-group">
						<div class="controls">
						<button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
						</div>
					</div>
				</fieldset>
			</form>
	<table class="table table-bordered">
		<thead>
				<tr>
				  	<th>Movie Number</th>
				  	<th>MOVIE NAME</th>
				  	<th>GENRE</th>
				  	<th>YEAR</th>
				  	<th>RATING</th>
				  	<th>ACTORS</th>
				  	<th>Length(mins)</th>
				 		
				 
				</tr>	
			</thead>
			<?php
				include('config.php');
				$SQLSELECT = "SELECT * FROM movies ";
				$result_set =  mysql_query($SQLSELECT, $conn1);
				while($row = mysql_fetch_array($result_set))
				{
				?>
			
					<tr>
						<td><?php echo $row['movie_id']; ?></td>
						<td><?php echo $row['moviename']; ?></td>
						<td><?php echo $row['genre']; ?></td>
						<td><?php echo $row['year']; ?></td>
						<td><?php echo $row['rating']; ?></td>
						<td><?php echo $row['actors']; ?></td>
						<td><?php echo $row['length']; ?></td>
					

					</tr>
				<?php
				}
			?>
		</table>
	</div>

	</div>

	</body>
</html>