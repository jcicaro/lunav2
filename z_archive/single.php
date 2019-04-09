<?php 
    get_header();

    $comp = new Luna_Component();

    ?>
    <div ng-if="c.searchText === ''">
        <?php $comp->single_main(); ?>
    </div>

    <div ng-if="c.searchText !== ''">
        <?php $comp->search_client(); ?>
    </div>

    <?php
    get_footer();

    
?>