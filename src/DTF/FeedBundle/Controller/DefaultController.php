<?php

namespace DTF\FeedBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DTFFeedBundle:Default:index.html.twig', array('name' => $name));
    }
}
