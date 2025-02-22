<header>
    <span class="logo">Blog Master</span>
    <nav>
        <a href="/">Main</a>
        <a href="/contacts.php">Contacts</a>
        <?php if (isset($_COOKIE['login'])): ?>
            <a href="/add_article.php">Add article</a>
            <a href="/usr_list.php" class="btn">Users List</a>
            <a href="/login.php" class="btn">User's Cabinet</a>
        <?php else: ?>
            <a href="/login.php" class="btn">LogIn</a>
            <a href="/register.php" class="btn">Registration</a>
        <?php endif; ?>
    </nav>
</header>