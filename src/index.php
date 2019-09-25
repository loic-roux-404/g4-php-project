<?php

use src\Autoloader;

const VF = 'Views/partials/';

//import 
require_once 'bootstrap.php';
Autoloader::register();

?>
<!DOCTYPE html>
<html lang="en">

<?php include(VF . "head.php"); ?>

<body>
    <div class="container">
        <?php include(VF . "navbar.php"); ?>

        <?php include(VF . "footer.php"); ?>
    </div>
</body>

</html>