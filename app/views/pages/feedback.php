<?php require_once APPROOT . '/views/inc/header.php'; ?>
<?php if(isset($_SESSION['user_id'])): ?>
<div class="container">
    <div class="col-md-5 mx-auto">
        <div class="card mt-5">
            <form method="post" action="<?php echo URLROOT; ?>/pages/feedback" class="forms" enctype="multipart/form-data">
                <div class="card text-center">
                    <div class="card-header"><h3>Оставьте отзыв о курсе!</h3></div>
                    <div class="card-body">
                        <label for="name" style="padding-bottom: 1em">Имя пользователя: </label>
                        <input class="form-control" type="text" id="name" name="name" value="<?php echo $_SESSION['user_name'] ?>"  disabled>
                        <label for="email" style="padding-bottom: 1em">Email: </label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="example@email.com" value="<?php echo $_SESSION['user_email'] ?>" disabled>
                        <label for="source">Где о Нас узнали? </label>
                        <div class="mx-6" style="padding-top: 1em; padding-bottom: 1em">
                            <select class="form-select form-select-sm"  aria-label=".form-select-sm example" id="source" name="source">
                                <option value="friends" selected>Друзья</option>
                                <option value="adds">Реклама</option>
                                <option value="search">В интернете</option>
                            </select>
                        </div>
                        <label for="skills" style="padding-bottom: 1em">Какой(-ие) курс(-ы) Вы изучали: </label>
                        <div class="mx-6" style="padding-bottom: 1em">
                            <input class="form-check-input mx-2" id="skills" type="checkbox" name="php">PHP
                            <input class="form-check-input mx-2" id="skills" type="checkbox" name="mysql">MySQL
                            <input class="form-check-input mx-2" id="skills" type="checkbox" name="js">JS
                            <input class="form-check-input mx-2" id="skills" type="checkbox" name="git">Git
                        </div>
                        <label for="message" style="padding-bottom: 1em">Ваши впечатления о курсе:</label>
                        <textarea class="form-control mb-3" style="resize: none" name="message" id="message" cols="50" rows="5" required></textarea>
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
<?php else: ?>
    <div class="col-md-3 mx-auto">
        <div class="card mt-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Оставить отзыв</h5>
                    <p class="card-text">Чтобы оставить отзыв, необходимо авторизоваться. Будем рады каждому отызву </p>
                    <a type="button" class="btn btn-secondary" href="<?php echo URLROOT?>/users/signin">Авторизоваться</a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php require_once APPROOT . '/views/inc/footer.php'; ?>

