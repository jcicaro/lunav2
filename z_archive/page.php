<?php 
    get_header();

    $comp = new Luna_Component();

    ?>
    <div ng-if="c.searchText === ''">
        <?php $comp->page(); ?>
    </div>

    <div ng-if="c.searchText !== ''">
        <?php $comp->search_client(); ?>
    </div>

    <?php
    get_footer();

    
?>