    <!-- head -->
    <?php include '../templates/inc/head.php'; ?>
    <!-- head -->

    <!-- Navbar -->
    <?php include '../templates/inc/navbar.php'; ?>
    <!-- Navbar -->
    <section class="container">
        <form method="POST" action="?action=new">
            <div class="form-group">
                <?php
                if (isset($errorMsg)) {
                    echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
                }
                ?>
                <label for="title">Titre</label>
                <input type="text" class="form-control mb-4" id="title" name="title" placeholder="Mon setup gamer">
                <label for="title">Prix total du setup</label>
                <input type="text" class="form-control mb-4" id="price" name="price" placeholder="1000€">
                <label for="title">Liste des composants de votre setup</label>
                <input type="text" class="form-control mb-4" id="description" name="description" placeholder="AMD RYZEN5, RTX 2080 ...">
                <label for="title">Lien de la photo de votre setup</label>
                <input type="text" class="form-control mb-4" id="url_photo_setup" name="url_photo_setup" placeholder="http://maconfig.io/action">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Soumettre Setup</button>
            </div>
        </form>
    </section>
    <!-- footer -->
    <?php include '../templates/inc/footer.php'; ?>
    <!-- footer -->