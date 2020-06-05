<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar banner" id="scrollEffectNavbar">
    <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="/">
            <strong class="blue-text">Ma Config.io</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left -->
            <ul class="navbar-nav mr-auto">

                <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] === '/') {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link waves-effect" href="/">Trouver une config</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect <?php if ($_SERVER['REQUEST_URI'] === '/new') {
                                                        echo "active";
                                                    } ?>" href="/new">Partager sa config</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0" method="get">
                <input name="search" class="form-control mr-sm-2" type="text" placeholder="Rechercher">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Rechercher</button>
            </form>

            <!-- Right -->
            <ul class="navbar-nav nav-flex-icons row">
                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="/logout" role="button">Logout</a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/login" role="button">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" href="/register" role="button">Sign Up</a>
                    </li>
                <?php
                }
                ?>
            </ul>

        </div>

    </div>
</nav>