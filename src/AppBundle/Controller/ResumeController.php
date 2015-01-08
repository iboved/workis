<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Resume;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ResumeController extends Controller
{
    /**
     * This method render all resumes or resumes filtered by city
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/resumes")
     * @Method({"GET"})
     */
    public function listAction(Request $request)
    {
        $city = $request->query->get('city');

        if (is_null($city)) {
            $resumes = $this->getDoctrine()->getRepository('AppBundle:Resume')->findAll();
        } else {
            $resumes = $this->getDoctrine()->getRepository('AppBundle:Resume')->findBy(['city' => $city]);
        }

        return $this->render('resume/list.html.twig', ['resumes' => $resumes]);
    }

    /**
     * This method render one resume
     *
     * @param Resume $resume
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/resumes/{id}")
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
     * @Route("/resumes/{id}/delete")
     * @Method({"DELETE"})
     */
    public function deleteAction(Resume $resume)
    {
        $this->getDoctrine()->getManager()->remove($resume);
        $this->getDoctrine()->getManager()->flush();

        return JsonResponse::create();
    }
}
