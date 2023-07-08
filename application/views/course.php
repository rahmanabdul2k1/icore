<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="col-lg-12 text-center">
            <h3 class="fw-semibold">Course List</h3>
        </div>
        <div class="row d-flex justify-content-evenly mt-5">
            <?php
            for ($i = 0; $i < count($data1['course']); $i++) {
            ?>
                <div class="card" style="width: 18rem;">
                    <img src="./assets/<?= $data1['course'][$i]->course_image ?>" class="card-img-top" alt="<?= $data1['course'][$i]->course_image ?>" style="width:100%" />
                    <div class="card-body">
                        <h5 class="card-title"><?= $data1['course'][$i]->course_name ?></h5>
                        <!-- <a href="<?= site_url('enrolled'); ?>/<?= $data1['course'][$i]->course_id ?>" course_id="<?= $data1['course'][$i]->course_id ?>" class="btn btn-primary stretched-link">Go somewhere</a> -->
                        <button course_id="<?= $data1['course'][$i]->course_id ?>" id="show_course" class="btn btn-primary stretched-link">Enrolled Details</button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="container mt-5" id="join_table">

    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#show_course', function() {
                course_id = $(this).attr("course_id");
                $.ajax({
                    url: '<?= base_url('welcome/enrolled') ?>',
                    method: 'POST',
                    data: {
                        course_id: course_id,
                    },
                    success: function(data) {
                        $('#rem_tab').remove();
                        $('#join_table').append(data);
                    }
                });
            });
        });
    </script>
</body>

</html>