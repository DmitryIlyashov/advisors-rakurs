    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="offset-sm-1 col-sm-10 offset-md-2 col-md-8 offset-lg-3 col-lg-6">
                    <form action="includes/question.inc.php" id="form" method="POST">
                        <div class="card bg-light mb-5 mt-3" style="width: 100%" id="question">
                            <div class="card-body">
                                <h3 class="card-title text-center">Возникли вопросы?</h3>
                                <h5 class="card-title text-center">Заполните форму ниже и с Вами свяжутся специалисты компании Ракурс</h5>
                                <form>
                                    <div class="form-group">
                                        <label for="company">Название организации *</label>
                                        <input type="text" class="form-control" id="company" name="company" placeholder="Навание Вашей компании" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="person-name">ФИО *</label>
                                        <input type="text" class="form-control" id="person-name" name="person" placeholder="Введите Ваше имя" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Электронная почта *</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Введите Ваш email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Телефон *</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Введите Ваш номер телефона" required>
                                    </div>
                                    <p class="mb-2">Реквизиты организации *</p>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="details" required>
                                            <label class="custom-file-label" for="details">Выбрать файл</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea type="text" class="form-control" id="question-text" name="question-text" placeholder="Текст Вашего вопроса"></textarea>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Отправить</button>
                                    <?php
                                        if(isset($_GET["question"])) {
                                            if ($_GET["question"] == "ok") {
                                                echo "<hr><p class='mt-2 text-info text-center'>Вопрос отправлен. Спасибо!</p>";
                                            }
                                        }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="footer-list text-light ml-0 pl-0">
                        <li>
                            <a href="https://www.rakurs.su/" target="_blank">
                                Сайт компании Ракурс
                            </a>    
                        </li>
                        <li><span class="text-primary">Телефон:</span> +7 (812) 655-07-68</li>
                        <li><span class="text-primary">Email:</span> support@rakurs.com</li>
                        <li><span class="text-primary">Адрес:</span> 198095, Санкт-Петербург,<br> м. Нарвская, Химический пер., д.1 корп.2</li>
                    </ul>
                    <p class="text-light">&copy; 2022, Rakurs</p>
                </div>
            </div>
        </div>
    </footer>
    
    <?php
        if(isset($_SESSION["creation_time"])) {
            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js"
            type="text/javascript"></script>';
            echo '<script type="text/javascript" src="js/mqtt.js"></script>';
            echo '<script type="text/javascript" src="js/session-time.js"></script>';
        }
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/app.js"></script>
</body>
</html>
