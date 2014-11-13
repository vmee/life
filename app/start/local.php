<?php

//

// Decode the settings to an associative array.
$site_settings = json_decode(file_get_contents(storage_path() . '/administrator_settings/site.json'), true);
// Add the site settings to the application configuration
Config::set('settings', $site_settings);