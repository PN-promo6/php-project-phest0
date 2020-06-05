    <!-- head -->
    {% include 'inc/head.php' %}
    <!-- head -->

    <!-- Navbar -->
    {% include 'inc/navbar.php' %}
    <!-- Navbar -->

    <section class="container">
        <div class="row">
            <div class="col">
                <h1>Choisir son setup</h1>
            </div>
        </div>

        <div class="row">

            <?php foreach ($items as $item) { ?>
                <div class="col-lg-4 mb-5">
                    <!-- Card -->
                    <div class="card">

                        <!-- Card content -->
                        <div class="card-body d-flex flex-row">

                            <!-- Avatar -->
                            <img src="<?php echo $item->user->profil_url_image ?>" class="rounded-circle mr-3" height="50px" width="50px" alt="avatar">

                            <!-- Content -->
                            <div>

                                <!-- Title -->
                                <h4 class="card-title font-weight-bold mb-2"><?php echo $item->title ?></h4>
                                <div class="row">
                                    <!-- Subtitle -->

                                    <div class="col-5">
                                        <a href="?search=@<?php echo $item->user->nickname ?>">@<?php echo $item->user->nickname ?></a>
                                        <span class="btn btn-outline-dark"><?php echo $item->price . "€" ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Card image -->
                        <div class="view overlay">
                            <img class="card-img-top rounded-0" src="<?php echo $item->url_photo_setup ?>" alt="Card image cap">
                            <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>

                        <!-- Card content -->
                        <div class="card-body description">
                            <p class="card-text"><?php echo $item->description ?></p>
                        </div>

                    </div>
                    <!-- Card -->
                </div>
            <?php } ?>
        </div>
        </div>
    </section>

    <!-- footer -->
    {% include 'inc/footer.php' %}
    <!-- footer -->