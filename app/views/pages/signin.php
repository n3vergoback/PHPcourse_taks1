<?php require_once APPROOT . '/views/inc/header.php'; ?>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body>
<?php require_once APPROOT . '/views/inc/nav.php'; ?>
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card mt-5">
                <form method="post" action="" class="forms" enctype="multipart/form-data">
                    <div class="card text-center">
                        <div class="card-header "><h2>Личный кабинет</h2></div>
                        <div class="card-body">
                            <label for="name">Email: </label>
                            <input class="form-control" type="text" name="name" required>
                            <label for="email">Пароль: </label>
                            <input class="form-control" type="email" name="email" placeholder="example@email.com" required>
                            <button class="btn btn-primary" onclick="">Войти</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require_once APPROOT . '/views/inc/footer.php'; ?>

<?php
