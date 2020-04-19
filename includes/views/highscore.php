<?php

echo $this->header;

?>
<style>
    .red {
        color: red;
    }
    body {
        font-family: "Helvetica Neue", Helvetica, Arial,sans-serif;
        font-size: 14px;
        line-height: 1.43;
        color: #333;
        margin: 0;
    }

    .withscroll {
        height: 400px;
        overflow-y: scroll;
        white-space: nowrap;
    }

    * {
        box-sizing: border-box;
    }
</style>
<body>
<div class="withscroll container table-responsive">
    <div class="row">
        <div class="col-12">
            <h1>Highscore</h1>
        </div>
        <div class="col-12">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>User_id</th>
                    <th>Nickname</th>
                    <th>Platzierung</th>
                    <th>Score</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($this->scores as $index => $scoreObj): ?>
                    <tr>
                    <?php if($scoreObj->score_id == 60/*$this->score_id->score_id*/):?>
                    <th class="red"><?php echo $scoreObj->score_id ?></th>
                    <th class="red"><?php echo $scoreObj->name ?></th>
                    <th class="red"><?php echo $index+1?>.</th>
                    <th class="red"><?php echo $scoreObj->score ?></th>
                    <?php else: ?>
                    <th><?php echo $scoreObj->score_id ?></th>
                    <th><?php echo $scoreObj->name ?></th>
                    <th><?php echo $index+1?>.</th>
                    <th><?php echo $scoreObj->score ?></th>
                    <?php endif;?>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <p class="form-check col-xs-12">
            Noch nicht genug? <a href="game" class="Overlay" id="toGame">HIER </a>klicken um nochmal zu spielen.
        </p>
    </div>
</div>

<script>
    var toGame = document.getElementById("toGame");

    toGame.onclick = function () {
        newLoad();
    }
</script>
</body>
<?php

echo $this->footer;

?>
