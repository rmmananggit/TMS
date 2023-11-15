<?php
include('./include/authentication.php');
include('./include/header.php');
include('./include/sidebar.php');
include('./include/topbar.php');
?>

<section>
    <div class="container-fluid py-2">

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $users = "SELECT
                            `user`.id, 
                            `user`.firstname, 
                            `user`.middlename, 
                            `user`.lastname, 
                            `user`.suffix, 
                            `user`.picture, 
                            user_type.type, 
                            billing.user_id, 
                            billing.subscription_plan, 
                            billing.mop, 
                            billing.reference_number, 
                            billing.screenshot, 
                            billing.amount, 
                            billing.`status`, 
                            billing.transaction_date, 
                            subscription_plans.plan_name, 
                            subscription_plans.price, 
                            GROUP_CONCAT(subscription_services.services) AS services
                        FROM
                            `user`
                            INNER JOIN
                            user_type
                            ON 
                                `user`.account_type = user_type.type_id
                            INNER JOIN
                            billing
                            ON 
                                `user`.id = billing.user_id
                            INNER JOIN
                            subscription_plans
                            ON 
                                billing.subscription_plan = subscription_plans.plan_id
                            INNER JOIN
                            subscription_services
                            ON 
                                subscription_plans.plan_id = subscription_services.subscription_plan_id
                        WHERE
                            `user`.id = '$id'
                        GROUP BY
                            `user`.id;";
            $users_run = mysqli_query($con, $users);

            if (mysqli_num_rows($users_run) > 0) {
                foreach ($users_run as $user) {
                    ?>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <?php
                                    echo '<img class="rounded-circle img-fluid" src = "data:image;base64,' . base64_encode($user['picture']) . '" 
                                    alt="image"  style="width: 150px;">';
                                    ?>
                                    <h5 class="my-3"><b><?= $user['firstname']; ?> <?= $user['lastname']; ?></b></h5>

                                    <p class="mb-1" style="color: <?= $user['type'] === 'Admin' ? 'green' : ($user['type'] === 'Tutor' ? '#e82020' : '#0c44ed'); ?>">
                                        <?= $user['type']; ?>
                                    </p>

                                </div>
                            </div>

                            <div class="card mb-4 mb-lg-0">
                                <div class="card-body p-0">
                                    <ul class="list-group list-group-flush rounded-3">
                                        <li class="list-group-item d-flex align-items-center justify-content-center p-3">
                                            <p class="mb-0"><b>SCREENSHOT</b></p>
                                        </li>
                                        <?php
                                        echo '<img class="img-fluid" src="data:image;base64,' . base64_encode($user['screenshot']) . '" 
                                        alt="image">';
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class=" mb-0"><?= $user['firstname']; ?> <?= $user['middlename']; ?> <?= $user['lastname']; ?> <?= $user['suffix']; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Mode of Payment</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class=" mb-0" style="color: green"><?= $user['mop']; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Reference Number</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class=" mb-0"><?= $user['reference_number']; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Amount</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class=" mb-0"><b>₱<?= $user['amount']; ?></b></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Status</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <?php
                                            $statusColor = ($user['status'] === 'Pending') ? 'text-warning' : (($user['status'] === 'Accepted') ? 'text-success' : 'text-danger');
                                            ?>
                                            <p class="mb-0 <?= $statusColor; ?>"><?= $user['status']; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Transaction Date</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class=" mb-0"><?= $user['transaction_date']; ?></p>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mb-4 mb-md-0">
                                        <div class="card-body">
                                            <h5 class="mb-4">Subscription Acquired</h5>

                                            <p class="mt-4 mb-1"></p><?= $user['plan_name']; ?> </p>
                                            <p class="mt-4 mb-1"></p>₱<?= $user['price']; ?>/month </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card mb-4 mb-md-0">
                                        <div class="card-body">
                                            <h5 class="mb-4">Subscription Services</h5>

                                            <p class="mb-1" style="white-space: pre-line;"><?= $user['services']; ?></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>
                <!-- Button section outside the loop -->
                <div class="row">
                <div class="col-12">
                <input type="submit" value="Cancel" class="btn btn-primary float-right mr-1">
                <a href="#" class="btn btn-danger float-right mr-1">Reject</a>
                <input type="submit" value="Approve" class="btn btn-success float-right mr-1">
                </div>
                </div>
                <?php
            } else {
                ?>
                <h4>No Record Found!</h4>
                <?php
            }
        }
        ?>
    </div>
</section>

<?php
include('./include/footer.php');
?>
