<h1>Luna Theme Options</h1>
<?php settings_errors(); ?>
<form method="POST" action="options.php">
    <?php settings_fields('luna-settings-group'); ?>
    <?php do_settings_sections('luna-utilities'); ?>
    <?php submit_button(); ?>
</form>