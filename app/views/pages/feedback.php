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
                        <label for="source">Где о Нас узнали? </label>
                        <div class="mx-6" style="padding-top: 1em; padding-bottom: 1em">
                            <select class="form-select form-select-sm"  aria-label=".form-select-sm example" id="source" name="source">
                                <option value="friends" selected>Друзья</option>
                                <option value="adds">Реклама</option>
                                <option value="search">Нашел Сам</option>
                            </select>
                        </div>
                        <label for="skills" style="padding-bottom: 1em">Какие курсы Вы приобрели: </label>
                        <div class="mx-6" style="padding-bottom: 1em">
                            <input class="form-check-input mx-2" id="skills" type="checkbox" name="php">PHP
                            <input class="form-check-input mx-2" id="skills" type="checkbox" name="mysql">MySQL
                            <input class="form-check-input mx-2" id="skills" type="checkbox" name="js">JS
                            <input class="form-check-input mx-2" id="skills" type="checkbox" name="git">Git
                        </div>
                        <label for="message" style="padding-bottom: 1em">Ваши впечатления о курсе:</label>
                        <textarea class="form-control mb-3" name="message" id="message" cols="50" rows="5" required></textarea>
                        <div class="mx-6" style="padding-top: 1em; padding-bottom: 1em">
                        <label for="rate" style="padding-bottom: 1em"  >Оценка: </label>
                        <input class="form-check-input" type="radio" id="rate" name="rate" value="1">
                        <label for="rate">1</label>
                        <input class="form-check-input" type="radio" id="rate" name="rate" value="2">
                        <label for="rate">2</label>
                        <input class="form-check-input" type="radio" id="rate" name="rate" value="3">
                        <label for="rate">3</label>
                        <input class="form-check-input" type="radio" id="rate" name="rate" value="4">
                        <label for="rate">4</label>
                        <input class="form-check-input" type="radio" id="rate" name="rate" value="5" checked>
                        <label for="rate">5</label>
                    </div>
                        <input class="btn btn-danger" type="reset">
                        <button class="btn btn-secondary" onclick="">Отправить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once APPROOT . '/views/inc/footer.php'; ?>

