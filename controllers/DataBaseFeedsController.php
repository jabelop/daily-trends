<?php
require_once ("models/Feed.php");

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

    public function getFeeds()
    {
        return $this->feeds;
    }

    public function getFeed($id)
    {
      foreach ($this->feeds as $feed) {
        if ($feed['id'] == $id) return $feed;
      }
    }

    public function getNumFeeds()
    {
        return $this->numFeeds;
    }


    // method for post a  new feed
    public function postNewFeed($feed, $image)
    {
         $this->feedEntity->setTitle($feed['title']);
         $this->feedEntity->setBody($feed['body']);
         $this->feedEntity->setImage($image);
         $this->feedEntity->setSource($feed['source']);
         $this->feedEntity->setPublisher($feed['publisher']);
         return $this->feedEntity->persistFeed();

    }

    //method for delete a feed from the data base
    public function deleteFeed($id) {
      return $this->feedEntity->deleteFeed($id);
    }

    // private method for feeds intialitation

    private function setFeeds()
    {
        $this->feeds    = $this->feedEntity->getFeeds();
        $this->numFeeds = count($this->feeds);
    }





}

?>
