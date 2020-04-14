<?php ?>
<link rel="stylesheet" type="text/css" href="css/scoreTabelle.css">
<!--My Modal -->
    <div id="myModal" class="scoreModal">
        <div class="scoreModal-content">
            <span class="close">&times;</span>

            <table id="score">
                <thead id="thead">
                <tr>
                    <th class="el">User_id</th>
                    <th class="el">Nickname</th>
                    <th class="el">Platzierung</th>
                    <th class="el">Score</th>
                </tr>
                </thead>
                <tbody id="tbody">

                <?php foreach ($this->scores as $index => $scoreObj): ?>
                    <tr>
                        <th class="el idU"><?php echo $scoreObj->id ?></th>
                        <th class="el scName"><?php echo $scoreObj->name ?></th>
                        <th class="el"><?php echo $index+1 ?>.</th>
                        <th class="el score"><?php echo $scoreObj->score ?></th>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>

<script>
    function setValues() {
        console.log("Hallo");
    }
</script>

<?php