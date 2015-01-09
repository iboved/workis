<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * This method render last three jobs
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/")
     * @Method({"GET"})
     */
    public function indexAction()
    {
        $jobs = $this->getDoctrine()->getRepository('AppBundle:Job')->findBy([], ['id' => 'DESC'], 3);

        $categories = $this->getDoctrine()->getRepository('AppBundle:Category')->findAll();

        return $this->render('default/index.html.twig', [
            'jobs' => $jobs,
            'categories' => $categories
        ]);
    }
}
