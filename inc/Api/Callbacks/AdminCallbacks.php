<?php

/**
 * @package  AllInOnePlugin
 */

namespace Inc\Api\Callbacks;
use Inc\base\BaseController;


class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once( "$this->plugin_path/templates/admin.php" );
    }

    public function adminCpt()
    {
        return require_once( "$this->plugin_path/templates/cpt.php" );
    }

    public function adminTaxonomy()
    {
        return require_once( "$this->plugin_path/templates/taxonomy.php" );
    }

    public function adminWidget()
    {
        return require_once( "$this->plugin_path/templates/widget.php" );
    }


    /*This one is second Admin menu*/
    public function adminSecondDashboard()
    {
        return require_once( "$this->plugin_path/templates/admin-second.php" );
    }


}