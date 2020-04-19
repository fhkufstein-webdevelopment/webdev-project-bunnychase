<?php

echo $this->header;

?>
<head>
    <link rel="stylesheet" type="text/css" href="css/design.css">
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
</head>

<style>
    .red {
        color: red;
    }

    .withscroll {
        height: 550px;
        overflow-y: scroll;
        white-space: nowrap;
    }

    thead>tr>th {
        font-size: 20px;
    }

    th {
        width: 25%;
    }
</style>
<body>
<div class="withscroll container table-responsive">
    <div class="row">
        <div class="col-12">
            <h1 style="text-align: center; font-weight: bold">Highscore</h1>
        </div>
        <div class="col-12">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Platzierung</th>
                    <th>Score</th>
                    <th>User_id</th>
                    <th>Nickname</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($this->scores as $index => $scoreObj): ?>
                    <tr>
                    <?php if($scoreObj->score_id == $this->score_id->score_id):?>
                    <th class="red"><?php echo $index+1 ?>.</th>
                    <th class="red"><?php echo $scoreObj->score ?></th>
                    <th class="red"><?php echo $scoreObj->id ?></th>
                    <th class="red"><?php echo $scoreObj->name ?></th>
                    <?php else: ?>
                    <th><?php echo $index+1 ?>.</th>
                    <th><?php echo $scoreObj->score ?></th>
                    <th><?php echo $scoreObj->id ?></th>
                    <th><?php echo $scoreObj->name ?></th>
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
    document.getElementById("toGame").onclick = function () {
        newLoad();
    }
</script>

</body>
<?php

echo $this->footer;

?>
