<?php
require_once "../models/Feed.php";

class FeedEntityTest {

  private $feed;

  private $title;
  private $body;
  private $image;
  private $source;
  private $publisher;


  public function __construct(){
      $this->feed = new Feed();
  }

  public function testTitle($title){

    $this->feed->setTitle($title);
    $this->title = $this->feed->getTitle();

    assert($title == $this->title);
  }

  public function testBody($body){

    $this->feed->setBody($body);
    $this->body = $this->feed->getBody();

    assert($body == $this->body);
  }

  public function testImage($image){

    $this->feed->setImage($image);
    $this->image = $this->feed->getImage();

    assert($image == $this->image);
  }

  public function testSource($source){

    $this->feed->setSource($source);
    $this->source = $this->feed->getSource();

    assert($source == $this->source);
  }

  public function testPublisher($publisher){

    $this->feed->setPublisher($publisher);
    $this->publisher = $this->feed->getPublisher();

    assert($publisher == $this->publisher);
  }

}


$feedTest = new FeedEntityTest();

$feedTest->testTitle("Title proof");

$feedTest->testBody("Body proof");

$feedTest->testImage("Image proof");

$feedTest->testSource("Source proof");

$feedTest->testPublisher("Publisher proof");
