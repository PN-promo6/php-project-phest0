    <!-- head -->
    {% include 'inc/head.php' %}
    <!-- head -->

    <!-- Navbar -->
    {% include 'inc/navbar.php' %}
    <!-- Navbar -->

    <div class="container log">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <form class="form-signin" method="POST" action="/login">
                    <?php
                    if (isset($errorMsg)) {
                        echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
                    }
                    ?>
                    <input type="text" class="form-control" name="username" placeholder="User Name" required="" autofocus="" />
                    <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- footer -->
    {% include 'inc/footer.php' %}
    <!-- footer -->