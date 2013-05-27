<?php
/**
 * Loads feed urls from configuration file.
 * 
 * @author Michael Mandt <michael.mandt@logic-works.de>
 * @package lw_feedteaser
 */

namespace lwFeedTeaser\Model\DataHandler;

class DataHandlerConfiguation
{
    protected $config;
    
    public function __construct($config)
    {
        $this->config = $config;
    }
    
    public function getUrlArray()
    {
        return $this->config["feedteaser"]["urls"];
    }
}