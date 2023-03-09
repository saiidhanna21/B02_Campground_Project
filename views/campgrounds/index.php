<?php
include('../layouts/boilerplate.php');
if (isset($_SESSION['flash'])) {
    echo $_SESSION['flash'];
    unset($_SESSION['flash']);
}
?>
<div class="container">
    <h1>Our CampGrounds</h1>
    <?php include('../../controllers/campgrounds/index.php') ?>
</div>
</body>

</html>