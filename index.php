<!DOCTYPE html>
<html lang="fr">
<?php

require_once "src/repository/ZoneRepository.php";
require_once "src/repository/PaysRepository.php";
require_once "src/repository/PointRepository.php";
require_once "src/repository/UserRepository.php";
include_once "src/components/header.php";
$zones = getZones();
$pays = getPays();
$utilisateurs = getUsers();
$points = getPoints();
?>

<body class="g-sidenav-show  bg-gray-200">
  <div class="container-fluid">
    <div class="row">

      <?php
      include_once "src/components/side_bar.php";
      include_once "src/components/content.php";
      ?>


      
    </div>
  </div>
<?php
include_once "src/components/modal.php";
include_once "src/components/footer.php";
?>
</body>

</html>