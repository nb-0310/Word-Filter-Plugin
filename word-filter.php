<?php

/*
Plugin Name: Word Filter
Description: This is my second plugin
Version: 1.0
Author Nirzar
Author URI: https://nirzarbhatt.netlify.app/
Text Domain: wcpdomain
Domain Path: /languages
*/

if (!defined("ABSPATH"))
    exit;

class OurWirdFilterPlugin
{
    function __construct()
    {
        add_action("admin_menu", array($this, "ourMenu"));
    }

    function ourMenu()
    {
        $name_age_hook = add_menu_page(
            "Words To Filter",
            "Word Filter",
            "manage_options",
            "our-word-filter",
            array(
                $this,
                "word_filter_page"
            ),
            "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMCAyMEMxNS41MjI5IDIwIDIwIDE1LjUyMjkgMjAgMTBDMjAgNC40NzcxNCAxNS41MjI5IDAgMTAgMEM0LjQ3NzE0IDAgMCA0LjQ3NzE0IDAgMTBDMCAxNS41MjI5IDQuNDc3MTQgMjAgMTAgMjBaTTExLjk5IDcuNDQ2NjZMMTAuMDc4MSAxLjU2MjVMOC4xNjYyNiA3LjQ0NjY2SDEuOTc5MjhMNi45ODQ2NSAxMS4wODMzTDUuMDcyNzUgMTYuOTY3NEwxMC4wNzgxIDEzLjMzMDhMMTUuMDgzNSAxNi45Njc0TDEzLjE3MTYgMTEuMDgzM0wxOC4xNzcgNy40NDY2NkgxMS45OVoiIGZpbGw9IiNGRkRGOEQiLz4KPC9zdmc+Cg==",
            100
        );

        add_submenu_page(
            "our-word-filter",
            "Words To Filter",
            "Words List",
            "manage_options",
            "our-word-filter",
            array(
                $this,
                "word_filter_page"
            )
        );

        add_submenu_page(
            "our-word-filter",
            "Word Filter Options",
            "Options",
            "manage_options",
            "word-filter-options",
            array(
                $this,
                "options_sub_page"
            )
        );

        add_action(
            "load-$name_age_hook", 
            array(
                $this,
                "main_page_assets"
            )
        );
    }

    function word_filter_page()
    { ?>
        <div class="wrap">
            <h1>Word Filter</h1>

            <form method="POST">
                <label for="plugin_words_to_filter">
                    Enter a <strong>comma separated</strong> list of words to filter from your site's content.
                </label>

                <div class="word-filter__flex-container">
                    <textarea name="plugin-words-filter" id="plugin-words-filter" placeholder="bad, mean, awful, horrible"></textarea>
                </div>

                <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Save Changes">
            </form>
        </div>
    <?php }

    function options_sub_page()
    { ?>
        Hello WOrd 
    <?php }

    function main_page_assets()
    {
        wp_enqueue_style('filter-admin-css', plugins_url('', __FILE__) . '/styles.css');
    }
}

$outWordFilterPlugin = new OurWirdFilterPlugin();