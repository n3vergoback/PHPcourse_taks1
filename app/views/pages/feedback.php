<?php require_once APPROOT . '/views/inc/header.php'; ?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<?php require_once APPROOT . '/views/inc/nav.php'; ?>
<div class="container">
    <div class="col-md-5 mx-auto">
        <div class="card mt-5">
            <form method="post" action="<?php echo URLROOT; ?>/pages/feedback" class="forms" enctype="multipart/form-data">
                <div class="card text-center">
                    <div class="card-header"><h3>Оставьте отзыв о курсе!</h3></div>
                    <div class="card-body">
                        <label for="name" style="padding-bottom: 1em">Имя пользователя: </label>
                        <input class="form-control" type="text" id="name" name="name"  required>
                        <label for="email" style="padding-bottom: 1em">Email: </label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="example@email.com" required>
                        <div class="mx-6" style="padding-top: 1em; padding-bottom: 1em">
                            <label for="sex" style="padding-bottom: 1em"  >Ваш пол: </label>
                            <input class="form-check-input" type="radio" id="sex" name="sex" value="male" checked>
                            <label for="sex">Мужской</label>
                            <input class="form-check-input" type="radio" id="sex" name="sex" value="female">
                            <label for="sex">Женский</label>
                        </div>
                        <label for="os">Ваша ОС: </label>
                        <div class="mx-6" style="padding-top: 1em; padding-bottom: 1em">
                            <select class="form-select form-select-sm"  aria-label=".form-select-sm example" name="os">
                                <option value="windows" selected>Windows</option>
                                <option value="macos">MacOS</option>
                                <option value="linux">Linux</option>
                            </select>
                        </div>
                        <label style="padding-bottom: 1em">Какие навыки Вы приобрели: </label>
                        <div class="mx-6" style="padding-bottom: 1em">
                            <input class="form-check-input mx-2" type="checkbox" name="php">PHP
                            <input class="form-check-input mx-2" type="checkbox" name="mysql">MySQL
                            <input class="form-check-input mx-2" type="checkbox" name="js">JS
                            <input class="form-check-input mx-2" type="checkbox" name="git">Git
                        </div>
                        <label for="info" style="padding-bottom: 1em">Ваши впечатления о курсе:</label>
                        <textarea class="form-control mb-3" name="info" id="info" cols="50" rows="5" required></textarea>
                        <button class="btn btn-primary" onclick="">Отправить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once APPROOT . '/views/inc/footer.php'; ?>

