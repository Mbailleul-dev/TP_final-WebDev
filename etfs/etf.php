<?php
session_start();

require_once "../models/database.php";
require_once "../models/etfModel.php";
require_once "../controllers/etfController.php";
require_once "../header2.php";
?>

<section>

    <div class="container">
        <div class="row text-center">
            <div class="col">
                <form action="#" method="POST">
                    <label for="etfChoice1">Choisissez un ETF: </label>
                    <select id="etfChoice1" name="etfChoice1">
                        <option>option1</option>
                        <?php foreach ($etfsList as $etf) { ?>
                            <option value="<?= $etf->ticker ?>"><?= $etf->name ?>(<?= $etf->investor ?>)</option>
                        <?php }
                        ?>
                    </select>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <div id="firstChartDiv" class="canvas">
                    <canvas id="firstChart"></canvas>
                </div>
            </div>
        </div>
    </div>




</section>


<?php
require_once "../footerETF.php";
?>