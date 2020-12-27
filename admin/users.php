<?php require_once('../config.php'); ?>
<?php if (in_array($_SESSION['user']['role'], ["Admin"])) { ?>

    <?php require_once(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
    <?php $id = 0;
    $titles = "Manage Users" ?>

    <?php include(ROOT_PATH . '/admin/includes/head.php'); ?>

    <?php
    // Get all admin roles from DB
    $roles = ['Author', 'Admin', 'Moderator'];

    // Get all admin users from DB
    $admins = getAdminUsers();
    ?>

    <body>

        <!-- admin navbar -->
        <?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
        <?php include(ROOT_PATH . '/admin/includes/banner.php') ?>


        <div class="container">

            <!-- Middle form - to create and edit  -->
            <div class="action mt-20">
                <div class="container">
                    <h2 class="page-title">Create/Edit Admin User</h2>
                    <div class="row">
                        <div class="col">
                            <form method="post" action="">

                                <!-- validation errors for the form -->
                                <?php include(ROOT_PATH . '/includes/errors.php') ?>

                                <!-- if editing user, the id is required to identify that user -->
                                <?php if ($isEditingUser === true) : ?>
                                    <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
                                <?php endif ?>

                                <input class="form-control mt-20 mb-20" type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">

                                <input class="form-control mb-20" type="email" name="email" value="<?php echo $email ?>" placeholder="Email">

                                <input class="form-control mb-20" type="password" name="password" placeholder="Password">

                                <input class="form-control mb-20" type="password" name="passwordConfirmation" placeholder="Password confirmation">

                                <select class="form-select mb-20 " name="role">
                                    <option value="" selected disabled>Assign role</option>
                                    <?php foreach ($roles as $role) : ?>
                                        <option value="<?php echo $role; ?>">
                                            <?php echo $role; ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>

                                <!-- if editing user, display the update button instead of create button -->
                                <?php if ($isEditingUser === true) : ?>
                                    <button type="submit" class="btn btn-primary float-right" name="update_admin">UPDATE</button>
                                <?php else : ?>
                                    <button type="submit" class="btn btn-primary float-right" name="create_admin">Save User</button>
                                <?php endif ?>

                            </form>
                        </div>
                        <div class="col">
                            <!-- Display notification message -->
                            <?php include(ROOT_PATH . '/includes/messages.php') ?>

                            <?php if (empty($admins)) : ?>
                                <h1>No admins in the database.</h1>
                            <?php else : ?>
                                <table class="table table-hover">
                                    <thead>
                                        <th>#</th>
                                        <th>Admin</th>
                                        <th>Role</th>
                                        <th colspan="2">Action</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($admins as $key => $admin) : ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td>
                                                    <?php echo $admin['username']; ?>, &nbsp;
                                                    <?php echo $admin['email']; ?>
                                                </td>
                                                <td><?php echo $admin['role']; ?></td>
                                                <td>
                                                    <a class="btn btn-success edit" href="users.php?edit-admin=<?php echo $admin['id'] ?>">
                                                        <i class="lni lni-pencil"></i>

                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-danger delete" href="users.php?delete-admin=<?php echo $admin['id'] ?>">
                                                        <i class="lni lni-trash"></i>

                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // Middle form - to create and edit -->
        </div>
    </body>
<?php } else {
    header('location: dashboard.php');
} ?>

</html>