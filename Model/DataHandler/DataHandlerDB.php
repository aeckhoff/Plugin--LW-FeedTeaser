<?php
/**
 * Loads feed urls from database.
 * 
 * @author Michael Mandt <michael.mandt@logic-works.de>
 * @package lw_feedteaser
 */

namespace lwFeedTeaser\Model\DataHandler;

class DataHandlerDB
{
    protected $db;
    
    public function __construct($db)
    {
        $this->db = $db;
    }
    
    public function getUrlArray()
    {
        return array();
    }
}