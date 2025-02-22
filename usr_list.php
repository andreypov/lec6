<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $ws_ttl = "Login";
    require "blocks/head.php" ?>
</head>

<body>
    <?php require "blocks/header.php" ?>

    <main>
        <h2>Users List</h2>
        <?php if (!isset($_COOKIE['log'])) : ?>
            <h3>Please Login</h3>
            <!-- <form>
                <label for="login">Login</label>
                <input type="text" name="login" id="login">

                <label for="password">Password</label>
                <input type="password" name="password" id="password">

                <div class="error-mess" id="error-block"></div>

                <button type="button" id="login_user">Login</button>
            </form> -->
        <?php else: ?>
            <?php
            require_once "lib/mysql.php";
            $query = "SELECT id, name, login FROM `users`";
            $res = $pdo->query($query);
            if ($res->rowCount() == 0) {
                echo '<h3>No users found</h3>';
            } else {
                while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="usr_lst_lin" id="usr_id_' . $row["id"] . '">';
                    echo '<span>User:' . $row["name"] . ' Login: ' . $row["login"] . '  </span>';
                    echo '<button onclick="return deleteUser(' . $row["id"] . ');">Delete</button>';
                    echo "</div>";
                }
            }
            ?>
        <?php endif; ?>
    </main>

    <?php require "blocks/aside.php" ?>

    <?php require "blocks/footer.php" ?>
    <script>
        function deleteUser(id) {
            $.ajax({
                url: 'ajax/dlt_usr.php',
                type: 'POST',
                cache: false,
                data: {
                    'id': id
                },
                dataType: 'html',
                success: function(data) {
                    // console.log(data);
                    if (data === "Done") {
                        $("#usr_id_".id).hide();
                        document.location.reload(true);
                    }
                }
            });

        };
    </script>
</body>

</html>