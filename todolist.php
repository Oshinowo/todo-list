<?php
include 'header.php';
include 'phpfiles.php';

?>
	<div class="container-fluid">
		<div class="card mx-auto my-5 col-sm-8 col-md-8 text-center jumbotron">
			<div class="card-content">
				<div class="card-header">
					<h2>To-Do List</h2>
				</div>
				<div class="card-body">
					<form action="" method="post" class="form">
						<div class="row">
							<div class="form-group col-md-4 col-sm-4">
								<input type="text" name="task" placeholder="Add Task" class="form-control task">
							</div>
							<div class="form-group col-md-3 col-sm-3">
								<input type="date" name="date" class="form-control date" placeholder="Date">
							</div>
							<div class="form-group col-md-3 col-sm-3">
								<input type="time" name="clock" class="form-control clock">
							</div>
							<div class="col-md-2 col-sm-2">
								<button type="submit" name="submit" id="add" class="btn btn-primary">ADD</button>
							</div>
						</div>	
					</form>
					<div class="table-responsive col-md-12 col-sm-10 mt-3">
						<table class="table table-striped">
							<thead>
								<th>SN</th>
								<th>Task(s)</th>
								<th>Date</th>
								<th>Time</th>
								<th>Action</th>
							</thead>
							<tbody>
								<?php
								$cnt = 1;
								$query_list = mysqli_query($con,"SELECT * FROM tasks");
								$count = mysqli_num_rows($query_list);
								if ($count > 0) {
									while ($fetch_list = mysqli_fetch_assoc($query_list)) {
										?>
										<tr>
									<td><?php echo $cnt++; ?></td>
									<td class="taskdata"><?php echo $fetch_list['task']; ?></td>
									<td class="datedata"><?php echo $fetch_list['calender']; ?></td>
									<td class="timedata"><?php echo $fetch_list['clock']; ?></td>
									<td>
										<!-- <div class="row"> -->
											<div class="col">
												<button data-toggle="modal" data-target="#modal<?php echo $fetch_list['id']; ?>" class="btn btn-info edit">Edit</button>&nbsp;
												<a href="phpfiles.php?del=<?php echo $fetch_list['id']; ?>" name="del" class="btn btn-danger delete">Delete</a>
											</div>
										<!-- </div> -->
									</td>
								</tr>

								<!-- Modal -->
								<div id="modal<?php echo $fetch_list['id']; ?>" class="modal fade" role="dialog">
  									<div class="modal-dialog modal-dialog-centered">
    									<!-- Modal content-->
    									<div class="modal-content">
    										<form action="" method="post">
      										<div class="modal-header text-center">
       							 				<h4 class="modal-title"><?php echo $fetch_list['task']; ?></h4>
      										</div>
      										<div class="modal-body">
												<div class="row">
													<div class="form-group col-4">
														<input type="text" name="updatetask" placeholder="Add Task" value="<?php echo $fetch_list['task']; ?>" class="form-control">
													</div>
													<div class="form-group col-4">
														<input type="date" name="updatedate" class="form-control" value="<?php echo $fetch_list['calender']; ?>">
													</div>
													<div class="form-group col-4">
														<input type="time" name="updateclock" class="form-control" value="<?php echo $fetch_list['clock']; ?>">
													</div>
												</div>
												<input type="hidden" name="taskid" value="<?php echo $fetch_list['id']; ?>">
      										</div>
      										<div class="modal-footer">
      											<button type="submit" name="update" class="btn btn-info">Update</button>
        										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      										</div>
											</form>
      									</div>	
    								</div>
  								</div>
								<!--   #end of modal     -->
										<?php
									}
								}
								?>
							</tbody>
						</table>
					</div>
				</div>	
			</div>
				<div class="card-footer">
					<span>Created by $oshinowo</span>
				</div>
			</div>
		</div>

<?php
include 'footer.php';
?>
