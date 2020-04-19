<?php

echo $this->header;

?>
<style>
    .red {
        color: red;
    }

    .withscroll {
        height: 400px;
        overflow-y: scroll;
        white-space: nowrap;
    }

    /*table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {background-color:#f5f5f5;}*/
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
