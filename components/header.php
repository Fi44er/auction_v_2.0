<?php
session_start();
require './components/preloader.php'
?>


<header>
    <a href="/" class="header_logo">Auction</a>
    <div>
        <ul class="header_nav">

            <?php if ($_SESSION) : ?>
                <li style="display: flex; grid-gap: 20px; align-items: center;"><img src="<?= $_SESSION['user']['avatar'] ?>" alt=""><a href="/login.php"><?php echo $_SESSION['user']['full_name']; ?></a></li>

            <?php else : ?>

                <li><a href="/login.php">Войти</a></li>
                <li><a href="/register.php">Зарегестрироваться</a></li>
            <?php endif; ?>
        </ul>
    </div>
</header>

<style>
    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 3rem;
        background: teal;
    }

    .header_logo {
        font-size: 2rem;
        color: white;
    }

    .header_nav {
        display: flex;
        grid-gap: 2rem;
        color: white;

    }

    .header_nav li {
        list-style-type: none;
    }

    .header_nav li a {
        color: white;
        font-size: 1.5rem;
    }

    .header_nav img {
        width: 50px;
        height: 50px;
        border-radius: 100%;
    }
</style>