<?php
    include_once 'header.php';
?>
<?php
    if(!isset($_SESSION["creation_time"])) {
        header("location: index.php");
        exit();
    }
?>

</header>
<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card bg-project-dark w-100">
                <div class="card-body">
                    <h5 class="card-title text-rakurs">Информация</h5>
                    <div id="broker-connection-status" class="text-info">
                        <span>Попытка начала сессии</span>
                        <div class="spinner-border spinner-border-sm text-rakurs" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <?php
                        if (isset($_SESSION["creation_time"])) {
                            $session_time_left = 600 - (time() - $_SESSION["creation_time"]);
                            echo '<p id="session-expire-seconds" class="sr-only">'.$session_time_left.'</p>';
                            echo '<p class="text-info">До окончания сессии осталось <span id="session-expire-time"></span></p>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card bg-project-dark mb-5 w-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item mr-2">
                                    <a class="nav-link active" id="pills-conveyor-tab" data-toggle="pill" href="#pills-conveyor" role="tab" aria-controls="pills-conveyor" aria-selected="true">Конвейер</a>
                                </li>
                                <li class="nav-item ml-2">
                                    <a class="nav-link" id="pills-boiler-tab" data-toggle="pill" href="#pills-boiler" role="tab" aria-controls="pills-boiler" aria-selected="false">Котел</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-conveyor" role="tabpanel" aria-labelledby="pills-conveyor-tab">
                                    <div class="row">
                                        <div class="col-md-5 col-lg-6 col-12">
                                            <h4 class="text-light">Статус</h4>
                                            <div class="d-flex flex-row mt-3">
                                                <span class="mr-3 text-secondary mode-text">Выкл</span>
                                                <label class="switch">
                                                    <input type="checkbox" id="conveyor-status" onchange="displayAndPublishConveyorStatus()">
                                                    <span class="slider round"></span>
                                                </label>
                                                <span class="ml-3 text-secondary mode-text">Вкл</span>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-lg-6 col-12">
                                            <div id="conveyor-status-message" class="text-info text-md-center">Конвейер выключен</div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-5 col-lg-6 col-12">
                                            <h4 class="text-light">Режим</h4>
                                            <div class="d-flex flex-row mt-3">
                                                <span class="mr-3 text-secondary mode-text">Стандартный</span>
                                                <label class="switch">
                                                    <input type="checkbox" id="conveyor-mode" onchange="displayAndPublishConveyorMode()">
                                                    <span class="slider round"></span>
                                                </label>
                                                <span class="ml-3 text-secondary mode-text">Экспертный</span>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-lg-6 col-12">
                                            <div id="conveyor-mode-message" class="text-info text-md-center">Выбран стандартный режим</div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-6 col-12">
                                            <label for="speed-range"><h4 class="text-light">Скорость</h4></label>
                                            <input type="range" class="custom-range" id="conveyor-speed" min="0" max="50" step="0.01" onclick="displayAndPublishConveyorSpeed()" value="0">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="text-info text-md-center speed-value-text">Текущая скорость <span id="conveyor-speed-message">0.00</span> Гц</div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <div id="instruction-conveyor" class="carousel slide" data-ride="touch">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#instruction-conveyor" data-slide-to="0" class="active"></li>
                                                    <li data-target="#instruction-conveyor" data-slide-to="1"></li>
                                                    <li data-target="#instruction-conveyor" data-slide-to="2"></li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <!--<img src="..." class="d-block w-100" alt="...">-->
                                                        <div style="width: 100%; height: 300px; border-radius: 7px;" class="bg-secondary">
                                                            <h1 class="text-center">Шаг 1</h1>
                                                        </div>
                                                        <div class="carousel-caption d-none d-md-block">
                                                            <p>Описание шага</p>
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <!--<img src="..." class="d-block w-100" alt="...">-->
                                                        <div style="width: 100%; height: 300px; border-radius: 7px;" class="bg-secondary">
                                                            <h1 class="text-center">Шаг 2</h1>
                                                        </div>
                                                        <div class="carousel-caption d-none d-md-block">
                                                            <p>Описание шага</p>
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <!--<img src="..." class="d-block w-100" alt="...">-->
                                                        <div style="width: 100%; height: 300px; border-radius: 7px;" class="bg-secondary">
                                                            <h1 class="text-center">Шаг 3</h1>
                                                        </div>
                                                        <div class="carousel-caption d-none d-md-block">
                                                            <p>Описание шага</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#instruction-conveyor" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#instruction-conveyor" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-boiler" role="tabpanel" aria-labelledby="pills-boiler-tab">
                                    <div class="row">
                                        <div class="col-md-5 col-lg-6 col-12">
                                            <h4 class="text-light">Статус</h4>
                                            <div class="d-flex flex-row mt-3">
                                                <span class="mr-3 text-secondary mode-text">Выкл</span>
                                                <label class="switch">
                                                    <input type="checkbox" id="boiler-status" onchange="displayAndPublishBoilerStatus()">
                                                    <span class="slider round"></span>
                                                </label>
                                                <span class="ml-3 text-secondary mode-text">Вкл</span>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-lg-6 col-12">
                                            <div id="boiler-status-message" class="text-info text-md-center">Котел выключен</div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-5 col-lg-6 col-12">
                                            <h4 class="text-light">Состояние двигателя насоса</h4>
                                            <div class="d-flex flex-row mt-3">
                                                <span class="mr-3 text-secondary mode-text">Норма</span>
                                                <label class="switch">
                                                    <input type="checkbox" id="boiler-motor" onchange="displayAndPublishBoilerMotor()">
                                                    <span class="slider round"></span>
                                                </label>
                                                <span class="ml-3 text-secondary mode-text">Авария</span>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-lg-6 col-12">
                                            <div id="boiler-motor-message" class="text-info text-md-center">Двигатель насоса в норме</div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-5 col-lg-6 col-12">
                                            <h4 class="text-light">Состояние горелки</h4>
                                            <div class="d-flex flex-row mt-3">
                                                <span class="mr-3 text-secondary mode-text">Норма</span>
                                                <label class="switch">
                                                    <input type="checkbox" id="boiler-burner" onchange="displayAndPublishBoilerBurner()">
                                                    <span class="slider round"></span>
                                                </label>
                                                <span class="ml-3 text-secondary mode-text">Авария</span>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-lg-6 col-12">
                                            <div id="boiler-burner-message" class="text-info text-md-center">Горелка в норме</div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <div id="instruction-boiler" class="carousel slide" data-ride="touch">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#instruction-boiler" data-slide-to="0" class="active"></li>
                                                    <li data-target="#instruction-boiler" data-slide-to="1"></li>
                                                    <li data-target="#instruction-boiler" data-slide-to="2"></li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <!--<img src="..." class="d-block w-100" alt="...">-->
                                                        <div style="width: 100%; height: 300px; border-radius: 7px;" class="bg-secondary">
                                                            <h1 class="text-center">Шаг 1</h1>
                                                        </div>
                                                        <div class="carousel-caption d-none d-md-block">
                                                            <p>Описание шага</p>
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <!--<img src="..." class="d-block w-100" alt="...">-->
                                                        <div style="width: 100%; height: 300px; border-radius: 7px;" class="bg-secondary">
                                                            <h1 class="text-center">Шаг 2</h1>
                                                        </div>
                                                        <div class="carousel-caption d-none d-md-block">
                                                            <p>Описание шага</p>
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <!--<img src="..." class="d-block w-100" alt="...">-->
                                                        <div style="width: 100%; height: 300px; border-radius: 7px;" class="bg-secondary">
                                                            <h1 class="text-center">Шаг 3</h1>
                                                        </div>
                                                        <div class="carousel-caption d-none d-md-block">
                                                            <p>Описание шага</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#instruction-boiler" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#instruction-boiler" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include_once 'footer.php';
?>