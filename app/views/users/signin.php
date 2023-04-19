<?php require_once APPROOT . '/views/inc/header.php'; ?>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body>
<?php require_once APPROOT . '/views/inc/nav.php'; ?>
    <div class="container">
        <div class="col-md-3 mx-auto">
            <div class="card mt-5">
                <form method="post" action="<?php echo URLROOT; ?>/users/signin" class="forms" enctype="multipart/form-data">
                    <div class="card text-center">
                        <div class="card-header"><h2>Личный кабинет</h2></div>
                        <div class="card-body">
                            <label for="email" style="padding-bottom: 1em">Email: </label>
                            <input class="form-control <?php echo (!empty($data['email_exists'])) ? 'is-invalid' : '' ?>"
                                   value="<?php echo $data['email']; ?>" type="email" id="email" name="email"  placeholder="example@email.com" required>
                            <span class="invalid-feedback"><?php echo $data['email_exists']; ?></span>
                            <label for="password" style="padding-bottom: 1em">Пароль: </label>
                            <input class="form-control <?php echo (!empty($data['pw_match'])) ? 'is-invalid' : '' ?>"
                                   value="<?php echo $data['password']; ?>" type="password" id="password" name="password" required>
                            <span class="invalid-feedback"><?php echo $data['pw_match']; ?></span>
                            <button class="btn btn-secondary mt-3" onclick="">Войти</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require_once APPROOT . '/views/inc/footer.php'; ?>

<?php
