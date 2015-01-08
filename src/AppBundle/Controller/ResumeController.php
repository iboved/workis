<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Resume;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/resumes")
 */
class ResumeController extends Controller
{
    /**
     * This method render all resumes
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/")
     * @Method({"GET"})
     */
    public function listAction()
    {
        $resumes = $this->getDoctrine()->getManager()->getRepository('AppBundle:Resume')->findAll();

        return $this->render('resume/list.html.twig', ['resumes' => $resumes]);
    }

    /**
     * This method render one resume
     *
     * @param Resume $resume
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/{id}")
     * @Method({"GET"})
     */
    public function viewAction(Resume $resume)
    {
        return $this->render('resume/view.html.twig', ['resume' => $resume]);
    }

    /**
     * This method delete resume
     *
     * @param Resume $resume
     * @return \Symfony\Component\HttpFoundation\Response|static
     *
     * @Route("/{id}/delete")
     * @Method({"DELETE"})
     */
    public function deleteAction(Resume $resume)
    {
        $this->getDoctrine()->getManager()->remove($resume);
        $this->getDoctrine()->getManager()->flush();

        return JsonResponse::create();
    }
}
