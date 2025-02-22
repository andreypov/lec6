<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $ws_ttl = "Blog Master";
    require "blocks/head.php" ?>
</head>

<body>
    <?php require "blocks/header.php" ?>

    <main>
        <!-- <p>Main text</p> -->
        <?php
        require_once "lib/mysql.php";

        $sql = 'SELECT * FROM articles ORDER BY `date` DESC';
        $query = $pdo->query($sql);
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            echo "<div class='post'><h2>" . $row->title . "</h2>
            <p>" . $row->anons . "</p>
            <p class='avtor'>Avtor: <span>" . $row->avtor . "</span></p>
            <a href='/post.php?id=" . $row->id . "' title='" . $row->title . "'>Read</a>
            </div>";
        }
        ?>
    </main>

    <?php require "blocks/aside.php" ?>

    <?php require "blocks/footer.php" ?>

</body>

</html>