<?php

echo $this->header;

?>
<style>
    body {
        /*height: 750px;
        overflow-y: scroll;*/
    }

    .red {
        color: red;
    }

    .withscroll {
        height: 400px;
        overflow-y: scroll;
        white-space: nowrap;
    }
</style>
<body>
<div class="container table-responsive">
    <div class="row">
        <div class="col-12">
            <h1>Highscore</h1>
        </div>
        <div class="col-12">
            <table class="table">
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
                    <?php if($scoreObj->score_id == $this->score_id->score_id):?>
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
</body>
<?php

echo $this->footer;

?>
