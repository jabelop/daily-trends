<?php
require_once ("db/db.php");

class Feed{
    private $db;
    private $tabla;

    // property for recover all the feeds
    private $feedsList;

    //properties for a single feed
    private $id;
    private $title;
    private $body;
    private $image;
    private $source;
    private $publisher;

    public function __construct(){
        $this->db=Conectar::conectaDb();
        $this->feedsList = array();
        $this->tabla     = "Daily.Feeds";
    }


    //getter methods
    public function getFeeds(){
        $resultado = $this->db->query("SELECT * FROM $this->tabla");
        foreach ($resultado as $value) {
            $this->feedsList[] = $value;
        }
        return $this->feedsList;
    }

    public function getId(){
      return $this->id;
    }

    public function getTitle(){
      return $this->title;
    }

    public function getBody(){
      return $this->body;
    }

    public function getImage(){
      return $this->image;
    }

    public function getSource(){
      return $this->source;
    }

    public function getPublisher(){
      return $this->publisher;
    }


    //setter methods

    public function setId($id){
      $this->id = $id;
    }


    public function setTitle($title){
      $this->title = $title;
    }

    public function setBody($body){
      $this->body = $body;
    }

    public function setImage($image){
      $this->image = $image;
    }

    public function setSource($source){
      $this->source = $source;
    }

    public function setPublisher($publisher){
      $this->publisher = $publisher;
    }

    // method for persist a new feed
    public function persistFeed(){
      $consulta = "INSERT INTO $this->tabla (title, body, image, source, publisher)
      VALUES (:title,:body, :image, :source, :publisher)";
      $result = $this->db->prepare($consulta);
      return $result->execute(array(":title"=>$this->title,":body"=>$this->body,
      ":image"=>$this->image, ":source"=>$this->source,
      ":publisher"=>$this->publisher));

    }
}
?>
