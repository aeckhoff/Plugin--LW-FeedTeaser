<?php
/**
 * Load specific object for loading feed urls.
 * 
 * @author Michael Mandt <michael.mandt@logic-works.de>
 * @package lw_feedteaser
 */


namespace lwFeedTeaser\Model\DataHandler;

class DataHandlerFactory
{   
    public static function getInstance($sourceType, $response)
    {
        switch ($sourceType) {
            case "configuration":
                return new \lwFeedTeaser\Model\DataHandler\DataHandlerConfiguation($response->getConfig());
                break;
            
            case "db":
                return new \lwFeedTeaser\Model\DataHandler\DataHandlerDB($response->getDbObject());
                break;
        }
        
        die("Unknown source!");
    }
}