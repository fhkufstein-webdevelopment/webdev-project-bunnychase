<?php

echo $this->header;
?>
<div class="container">
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
                    <th><?php echo $scoreObj->id ?></th>
                    <th><?php echo $scoreObj->name ?></th>
                    <th><?php echo $index+1?>.</th>
                    <th><?php echo $scoreObj->score ?></th>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <p class="form-check col-xs-12">
            Noch nicht genug? <a href="game#again" class="registerOverlay">HIER </a>klicken um nochmal zu spielen.
        </p>
    </div>
</div>
<?php

echo $this->footer;

?>