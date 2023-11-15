<?php
 include('./include/authentication.php');
 include('./include/header.php');
 include('./include/sidebar.php');
 include('./include/topbar.php');
 ?>


    <!-- Begin Page Content -->
    <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manage User</h6>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
    
                <tbody>
              <?php
                            $query = "SELECT
                            `user`.id, 
                            `user`.firstname, 
                            `user`.lastname, 
                            `user`.suffix, 
                            `user`.purok, 
                            `user`.barangay, 
                            `user`.municipality, 
                            `user`.picture, 
                            user_status.`status`, 
                            user_type.type
                        FROM
                            `user`
                            INNER JOIN
                            user_status
                            ON 
                                `user`.account_status = user_status.status_id
                            INNER JOIN
                            user_type
                            ON 
                                `user`.account_type = user_type.type_id";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td class="text-center">
                                    <?php 
                                        echo '<img class="img-fluid img-bordered-sm clickable-image" 
                                            data-image="'.base64_encode($row['picture']).'" 
                                            src="data:image;base64,'.base64_encode($row['picture']).'" 
                                            alt="image" 
                                            style="height: 170px; max-width: 310px; object-fit: cover;">'; 
                                    ?>
                                </td>
                                    <td><b><?= $row['firstname']; ?> <?= $row['lastname']; ?> <?= $row['suffix']; ?></b></td>
                                    <td>Purok <b><?= $row['purok']; ?> <?= $row['barangay']; ?> <?= $row['municipality']; ?></b></td>
                                    <td><?= $row['type']; ?></td>
                                    <td style="color: 
                                    <?= $row['status'] === 'Active' ? 'green' : ($row['status'] === 'Deactivated' ? 'red' : '#ed8e1a'); ?>
                                    ;">
                                    <?= $row['status']; ?>
                                    </td>

                                    
                                <td class="text-center">

<form action="process.php" method="POST">  
<div class="btn-group" role="group" aria-label="Basic outlined example">
<a type="button" class="btn btn-outline-primary" href="user_profile.php?id=<?=$row['id'];?>">View</a>

<button type="submit" name="delete_coordinator" value="<?=$row['id']; ?>" class="btn btn-outline-danger">Delete</button>
</div>

</form>


</td>
                                    </tr>
                                    <?php
                                }
                            } else
                            {
                            ?>
                                <tr>
                                    <td colspan="6">No Record Found</td>
                                </tr>
                            <?php
                            }
                            ?>
              </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->





<!-- Modal for User Pictures -->
<div id="imageModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="modalImage">
    <div id="caption"></div>
</div>





<script>
    $(document).ready(function () {
        // Function to toggle modal visibility and set image attributes
        function openModal(imageData) {
            var modalImage = $('#modalImage');
            var captionText = $('#caption');

            modalImage.attr('src', 'data:image;base64,' + imageData);
            modalImage.alt = "User Profile Picture";
            captionText.html("User Profile Picture");

            // Display the modal
            $('#imageModal').css('display', 'block');
        }

        // Click event for the clickable image
        $('.clickable-image').on('click', function () {
            var imageData = $(this).data('image');
            openModal(imageData);
        });

        // Close the modal when the close button is clicked
        $('.close').on('click', function () {
            $('#imageModal').css('display', 'none');
        });

        // Close the modal when clicking outside the modal content
        $(window).on('click', function (event) {
            var modal = $('#imageModal');
            if (event.target == modal[0]) {
                modal.css('display', 'none');
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Function to toggle pagination visibility
        function togglePagination(visibility) {
            $('#dataTable_paginate').css('display', visibility);
        }

        // Click event for the screenshot
        $('.clickable-image').on('click', function () {
            var imageData = $(this).data('image');
            var modalImage = $('#modalImage');
            var captionText = $('#caption');

            modalImage.attr('src', 'data:image;base64,' + imageData);
            modalImage.alt = "Modal Image";

            // Hide pagination when the modal is opened
            togglePagination('none');

            // Display the modal
            $('#imageModal').css('display', 'block');
        });

        // Close the modal when the close button is clicked
        $('.close').on('click', function () {
            // Show pagination when the modal is closed
            togglePagination('block');
            
            $('#imageModal').css('display', 'none');
        });

        // Close the modal when clicking outside the modal content
        $(window).on('click', function (event) {
            var modal = $('#imageModal');
            if (event.target == modal[0]) {
                // Show pagination when the modal is closed
                togglePagination('block');
                
                modal.css('display', 'none');
            }
        });
    });
</script>





<?php
 include('./include/footer.php');
 ?>
