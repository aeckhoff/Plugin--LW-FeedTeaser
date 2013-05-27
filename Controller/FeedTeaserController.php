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
    public function __construct($response)
    {
        $this->response = $response;
        $this->config = $response->getConfig();
    }

    public function execute()
    {       
        if(!array_key_exists("feedteaser", $this->config)){
            die("configuration entry 'feedteaser' is missing!");
        }
        $datahandler = \lwFeedTeaser\Model\DataHandler\DataHandlerFactory::getInstance($this->config["feedteaser"]["source"], $this->response);
        $parser = new \lwFeedTeaser\Model\PrepareFeedTeaserList($datahandler->getUrlArray());
        $view = new \lwFeedTeaser\Views\FeedTeaserList();
        $this->response->setOutputByKey("lwFeedTeaser", $view->render($parser->prepare()));
    }
}
