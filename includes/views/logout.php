<?php

echo $this->header;

?>

<?php
echo "<script>document.cookie = \"scoreId=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;\";</script>";
?>
    <div id="main">
        <div class="row">
            <h1 class="col-xs-12">Logout erfolgreich</h1>
            <p class="col-xs-12">Sie sind jetzt abgemeldet. <a href="login">Klicken Sie hier um sich wieder anzumelden.</a></p>
        </div>
    </div>


<?php

echo $this->footer;

?>
