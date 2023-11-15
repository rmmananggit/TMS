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
                <h6 class="m-0 font-weight-bold text-primary">Billing Records</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Mode of Payment</th>
                                <th>Proof of billing</th>
                                <th>Status</th>
                                <th>Transaction Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $query = "SELECT
                                `user`.firstname, 
                                `user`.lastname, 
                                billing.reference_number, 
                                billing.screenshot, 
                                billing.amount, 
                                billing.transaction_date, 
                                `user`.picture, 
                                billing.mop, 
                                billing.`status`, 
                                billing.user_id, 
                                billing.billing_id, 
                                `user`.suffix
                            FROM
                                billing
                                INNER JOIN
                                `user`
                                ON 
                                    billing.user_id = `user`.id";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                            ?>
                                    <tr>
                                        <td><?= $row['billing_id']; ?></td>
                                        <td><b><?= $row['firstname']; ?> <?= $row['lastname']; ?> <?= $row['suffix']; ?></b></td>
                                        <td style="color: green;"><?= $row['mop']; ?></td>
                                        <td>
                                            <?php
                                            echo '<img class="img-fluid img-bordered-sm clickable-image" 
                                            data-image="' . base64_encode($row['screenshot']) . '" 
                                            src="data:image;base64,' . base64_encode($row['screenshot']) . '" 
                                            alt="image" 
                                            style="height: 170px; max-width: 310px; object-fit: cover;">';
                                            ?>
                                        </td>
                                        <td style="color: 
                                            <?= $row['status'] === 'Pending' ? '#ed8e1a' : ($row['status'] === 'Accepted' ? 'green' : 'red'); ?>
                                            ;">
                                            <?= $row['status']; ?>
                                        </td>

                                        <td><?= $row['transaction_date']; ?></td>

                                        <td class="text-center">

                                            <form action="process.php" method="POST">
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <a type="button" class="btn btn-outline-primary" href="view_billing.php?id=<?= $row['user_id']; ?>">View</a>
                                                </div>
                                            </form>
                                        </td>

                                    </tr>
                            <?php
                                }
                            } else {
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

    <!-- Bootstrap Modal -->
    <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalImage">
        <div id="caption"></div>
    </div>

    <script>
        $(document).ready(function () {
            $('.clickable-image').on('click', function () {
                var imageData = $(this).data('image');
                var modalImage = $('#modalImage');
                var captionText = $('#caption');

                modalImage.attr('src', 'data:image;base64,' + imageData);
                modalImage.alt = "Modal Image";
                captionText.html("Proof of Billing");

                // Display the modal
                $('#imageModal').css('display', 'block');
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
                captionText.html("Proof of Billing");

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
