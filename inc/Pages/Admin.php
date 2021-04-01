<?php
/**
 * @package  AllInOnePlugin
 */

namespace Inc\Pages;
use Inc\Api\SettingsApi;
use Inc\base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;



class Admin extends BaseController
{

    public $settings;

    public $callbacks;

    public $pages = array();

    public $subpages = array();



    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();   // this one

        $this->setSubpages();//next one


        $this->settings->addAllinonePages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();
    }

    public function setPages() // this one
    {
        $this->pages = array(
            array(
                'page_title' => 'All In One Plugin',
                'menu_title' => 'All-In-One',
                'capability' => 'manage_options',
                'menu_slug' => 'all_in_one',
                'callback' => array( $this->callbacks, 'adminDashboard' ),
                'icon_url' => 'dashicons-store',
                'position' => 110
            ),
            array(
                'page_title' => 'all_in_one',
                'menu_title' => 'Second-plugin',
                'capability' => 'manage_options',
                'menu_slug' => 'second_plugin',
                'callback' => array( $this->callbacks, 'adminSecondDashboard' ),
                'icon_url' => 'dashicons-external',
                'position' => 9
            ),
        );
    }

    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'all_in_one',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'all_in_one_cpt',
                'callback' => array( $this->callbacks, 'adminCpt' )
            ),
            array(
                'parent_slug' => 'all_in_one',
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'all_in_one_taxonomies',
                'callback' => array( $this->callbacks, 'adminTaxonomy' )
            ),
            array(
                'parent_slug' => 'all_in_one',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'all_in_one_widgets',
                'callback' => array( $this->callbacks, 'adminWidget' )
            )
        );
    }
}