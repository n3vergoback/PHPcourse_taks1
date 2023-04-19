<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo URLROOT . '/pages/index' ?>"> <?php echo SITENAME ?> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <li class="nav-item">
                    <?php if (isset($_SESSION['user_id'])): ?>
                    <a class="nav-link active" aria-current="page" href="<?php echo URLROOT . '/pages/feedback' ?>">Оставить отзыв</a>
                    <?php endif; ?>
                </li>
            </div>
        </div>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a type="button" class="btn btn-light" href="<?php echo URLROOT . '/users/logout' ?>">Выйти</a>
        <?php else: ?>
            <a type="button" class="btn btn-light" href="<?php echo URLROOT . '/users/signin' ?>">Войти</a>
            <a type="button" class="btn btn-light" href="<?php echo URLROOT . '/users/signup' ?>">Зарегистрироваться</a>
        <?php endif; ?>
    </div>
</nav>