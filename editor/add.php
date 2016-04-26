<?php include '../theme/header.php'; // header.php ?>
  <?php include '../theme/sidebar.php'; // sidebar.php ?>

<div class="content-wrapper">
  <?php if ($data['requirePassword'] && !isset($_SESSION['evdir_loggedin'])): ?>

			<div class="row">
				<div class="col-xs-12">
				<hr>
					<form action="" method="post" class="text-center form-inline">
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" name="password" class="form-control">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</form>
				</div>
			</div>

		<?php else: ?>

			<?php if(! empty($data['directoryTree'])): ?>
				<div class="row">
					<div class="col-xs-12">
						<ul class="breadcrumb">
						<?php foreach ($data['directoryTree'] as $url => $name): ?>
							<li>
								<?php
								$lastItem = end($data['directoryTree']);
								if($name === $lastItem):
									echo $name;
								else:
								?>
									<a href="?dir=<?php echo $url; ?>">
										<?php echo $name; ?>
									</a>
								<?php
								endif;
								?>
							</li>
						<?php endforeach; ?>
						</ul>
					</div>
				</div>
			<?php endif; ?>


				<div class="row">
					<div class="col-xs-12">
						<div class="table-container">
							<table class="table table-striped table-bordered">
								<?php if (! empty($data['directories'])): ?>
									<thead>
										<th>Directory</th>
									</thead>
									<tbody>
										<?php foreach ($data['directories'] as $directory): ?>
											<tr>
												<td>
													<a href="<?php echo $directory['url']; ?>" class="item dir">
														<?php echo $directory['name']; ?>
													</a>

													<?php if ($listing->enableDirectoryDeletion): ?>
														<span class="pull-right">
															<a href="<?php echo $directory['url']; ?>&delete=true" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')">Delete</a>
														</span>
													<?php endif; ?>
												</td>

											</tr>
										<?php endforeach; ?>
									</tbody>
								<?php endif; ?>

								<?php if($listing->enableDirectoryCreation): ?>
								<tfoot>
									<tr>
										<td>
											<form action="" method="post" class="text-center form-inline">
												<div class="form-group">
													<label for="directory">Directory Name:</label>
													<input type="text" name="directory" id="directory" class="form-control">
													<button type="submit" class="btn btn-primary" name="submit">Create Directory</button>
												</div>
											</form>
										</td>
									</tr>
								</tfoot>
								<?php endif; ?>
							</table>
						</div>
					</div>
				</div>

			<?php if ($data['enableUploads']): ?>
				<div class="row">
					<div class="col-xs-12">
						<form action="" method="post" enctype="multipart/form-data" class="text-center upload-form form-vertical">
							<h4>Upload A File</h4>
							<div class="row upload-field">
								<div class="col-xs-12">
									<div class="form-group">
										<div class="row">
											<div class="col-sm-2 col-md-2 col-md-offset-3 text-right">
												<label for="upload">File:</label>
											</div>
											<div class="col-sm-10 col-md-4">
												<input type="file" name="upload[]" id="upload" class="form-control">
											</div>
										</div>
									</div>
								</div>
							</div>
							<hr>
							<?php if ($listing->enableMultiFileUploads): ?>
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-2 col-lg-3 col-lg-offset-2">
										<button type="button" class="btn btn-success btn-block" name="add_file">Add Another File</button>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-1 col-lg-3 col-lg-offset-2">
										<button type="submit" class="btn btn-primary btn-block" name="submit">Upload File(s)</button>
									</div>
								</div>
							<?php else: ?>
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-sm-offset-3">
										<button type="submit" class="btn btn-primary btn-block" name="submit">Upload File</button>
									</div>
								</div>
							<?php endif; ?>
						</form>
					</div>
				</div>
			<?php endif; ?>
      <?php endif; ?>
</div><!--/ .content /-->
<?php include '../theme/footer.php'; // header.php ?>
