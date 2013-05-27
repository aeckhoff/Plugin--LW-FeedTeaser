<?php

/**
 * This plugin supports the creation of a feed list teaser.
 * 
 * @author Michael Mandt <michael.mandt@logic-works.de>
 * @package lw_feedteaser
 */
class lw_feedteaser extends lw_plugin
{
    /**
     * For the functionality of this plugin is it necessary to include
     * the "Autoloader" object.
     */
    public function __construct()
    {
        parent::__construct();
        include_once(dirname(__FILE__) . '/Services/Autoloader.php');
        $autoloader = new \lwFeedTeaser\Services\Autoloader();
    }

    /**
     * The HTML frontend output will be build for logged in user. Not logged in
     * user will be redirected to the login page. 
     * 
     * @return string
     */
    public function buildPageOutput()
    {
        $response = new \lwFeedTeaser\Services\Response();

        $controller = new \lwFeedTeaser\Controller\FeedTeaserController($response, $this->config);
        $controller->execute();

        return $response->getOutputByKey("lwFeedTeaser");
    }

    /**
     * The HTML backend output will be build.
     * 
     * @return string
     */
    public function getOutput()
    {
        return "";
    }

    /**
     * Here will be set if the plugin-conetentbox is deleteable from a page.
     * 
     * @return boolean
     */
    function deleteEntry()
    {
        return true;
    }
}