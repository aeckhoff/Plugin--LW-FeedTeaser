<?php

/**
 * This class prepares the html frontend output. The template
 * will be set with the required informations.
 * 
 * @author Michael Mandt <michael.mandt@logic-works.de>
 * @package lw_feedteaser
 */

namespace lwFeedTeaser\Views;

class FeedTeaserList
{

    public function render($feeds)
    {
        $view = new \lw_view(dirname(__FILE__) . '/Templates/FeedTeaserList.phtml');
        $view->feeds = $feeds;        
        return $view->render();
    }

}