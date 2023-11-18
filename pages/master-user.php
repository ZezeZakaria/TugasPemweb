<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . "..") . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");


?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Master User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Master User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
          <!-- Start ngoding disini -->

          <!-- End ngoding -->
        </div>
    </section>
</main><!-- End #main -->

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>