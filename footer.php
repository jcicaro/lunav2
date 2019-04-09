
        </div> <!-- hide if c.searchText is not empty -->

        

        <?php 

            $footer_page_id = get_theme_mod('luna_footer_page', '');
            $footer_page = get_page($footer_page_id);
            echo $footer_page->post_content;

        ?>

    </div> <!-- container -->

    <?php 
    wp_footer(); 
    ?>
</body>
</html>