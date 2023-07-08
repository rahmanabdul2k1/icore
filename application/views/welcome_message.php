<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Enrollment</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
	<div class="container mt-5">
		<div class="col-lg-12 text-center">
			<h3 class="fw-semibold">Enroll Course</h3>
		</div>
		<form action="<?= base_url('enroll'); ?>" method="post">
			<div class="mt-5 mb-3">
				<label>Student Name : </label>
				<select class="form-select" aria-label="Default select example" name="stu" onchange="getval(this);">
					<option selected disabled hidden>Select Student</option>
					<?php
					for ($i = 0; $i < count($data['student']); $i++) {
					?>
						<option value="<?= $data['student'][$i]->student_id ?>"><?= $data['student'][$i]->student_name ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="mb-5">
				<label>Course Name : </label>
				<select class="form-select" aria-label="Default select example" name="course">
					<option selected disabled hidden>Select Course</option>
					<?php
					for ($i = 0; $i < count($data['course']); $i++) {
					?>
						<option value="<?= $data['course'][$i]->course_id ?>"><?= $data['course'][$i]->course_name ?></option>
					<?php } ?>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Enroll</button>
		</form>
	</div>

	<!-- <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	<!-- <script>
		function getval(id) {
			stu_id = id.value;
			$.ajax({
				url: '<?= base_url('welcome/stu_check') ?>',
				method: 'POST',
				data: {
					stu_id: stu_id,
				},
				success: function(data) {
					// for (let i = 0; i < data.length; i++) {
					// 	console.log(JSON.parse(data)[i].course_id);
					// }
					console.log(data)
				}
			});
		}
	</script> -->
</body>

</html>