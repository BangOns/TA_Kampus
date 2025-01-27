<?php
var_dump(dirname(__DIR__, 1));
?>
<main class="  md:ml-56  lg:ml-64 md:mt-10 px-4 pt-5  ">
    <?php include __DIR__ . '/components/header.php'; ?>
    <?php include __DIR__ . '/components/card-summary.php'; ?>
    <?php include __DIR__ . '/components/table-dashboard.php'; ?>
    <?php include dirname(__DIR__, 1) . '/templates/components/modals-detail-edit.php'; ?>
</main>
<script src="<?= BASEURL; ?>/js/script_dashboard.js"></script>