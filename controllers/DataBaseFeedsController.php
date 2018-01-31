<?php
require_once "../models/Feed.php";

class DataBaseFeedsController {

    // properties for the data base feeds
    private $feeds, $numFeeds;

    // properties for the model
    private $feedEntity;

    public function __construct()
    {
        $this->feedEntity = new Feed();
        $this->feeds      = array();
        $this->numFeeds   = 0;

        $this->setFeeds();
    }

    // public methods for pass data to the index controller

    public getFeeds()
    {
        return $this->feeds;
    }

    public getNumFeeds()
    {
        return $this->numFeeds;
    }

    // private method for feeds intialitation

    private setFeeds()
    {
        $this->feeds    = $this->feedEntity->getFeeds();
        $this->numFeeds = count($this->feeds);
    }




}

?>
