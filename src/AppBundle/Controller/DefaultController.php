<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Notice;
use AppBundle\Form\NoticeType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        
        
        $em = $this->getDoctrine()->getManager();
        
        $notices = $em->getRepository('AppBundle:Notice')->findAll();
        
        
        return $this->render('default/index.html.twig', array(
        'notices' =>$notices));
    }
    
    /**
     * @Route("/notice", name="notice")
     */
    public function addNotice()
    {
        
       $newNotice = new Notice();
       $form = $this->createCreateForm($newNotice);
       
       return $this->render("default/form/form.html.twig", array(
           'form'=> $form->createView()));
        
    }
    
    /**
     * @Route("/create", name="create")
     */
    public function postNotice()
    {
        
        
    }
    
    // method for form creation
    private function createCreateForm(Notice $notice)
    {
        $form = $this->createForm(new NoticeType(), $notice, array(
                'action' => $this->generateUrl('create'),
                'method' => 'POST'
            ));
        return $form;
    }
    
}


 