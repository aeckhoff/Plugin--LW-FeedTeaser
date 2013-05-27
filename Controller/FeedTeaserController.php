<?php

/**
 * Controller collects necessary informations and pass them
 * to the specific classes in case of which job has to be done.
 *
 * @author Michael Mandt <michael.mandt@logic-works.de>
 * @package lw_feedteaser
 */

namespace lwFeedTeaser\Controller;

class FeedTeaserController
{
    private $response;
    private $config;
    
    /**
     * @param object $response
     */
    public function __construct($response, $config)
    {
        $this->response = $response;
        $this->config = $config;
    }

    public function execute()
    {
        $parser = new \lwFeedTeaser\Model\PrepareFeedTeaserList($this->config);
        $view = new \lwFeedTeaser\Views\FeedTeaserList();
        $this->response->setOutputByKey("lwFeedTeaser", $view->render($parser->prepare()));
    }
}
