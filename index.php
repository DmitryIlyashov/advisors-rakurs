<?php
    include_once 'header.php'
?>

<?php
    if (isset($_SESSION["creation_time"])) {
        header("location: control.php");
        exit();    
    }
?> 

</header>
<div class="container">
    <div class="row mt-5">
        <div class="offset-lg-3 col-lg-6 offset-md-2 col-md-8 offset-1 col-10">
            <div class="button-container">
                <a href="includes/login.inc.php">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Начать
                </a>
                <?php
                    if(isset($_GET["error"])) {
                        if ($_GET["error"] == "systemisnotfree") {
                            echo "<p class='mt-5 text-info text-center'>Система сейчас занята. Попробуйте выполнить вход позже.</p>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
    include_once 'footer.php';
?>