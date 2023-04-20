<?php require_once APPROOT . '/views/inc/header.php'; ?>
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
