<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Job;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class JobController extends Controller
{
    /**
     * This method render all jobs or jobs filtered by city
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/jobs")
     * @Method({"GET"})
     */
    public function listAction(Request $request)
    {
        $city = $request->query->get('city');

        if (is_null($city)) {
            $jobs = $this->getDoctrine()->getRepository('AppBundle:Job')->findAll();
        } else {
            $jobs = $this->getDoctrine()->getRepository('AppBundle:Job')->findBy(['city' => $city]);
        }

        return $this->render('job/list.html.twig', ['jobs' => $jobs]);
    }

    /**
     * This method render one job
     *
     * @param Job $job
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/jobs/{id}")
     * @Method({"GET"})
     */
    public function viewAction(Job $job)
    {
        return $this->render('job/view.html.twig', ['job' => $job]);
    }

    /**
     * This method delete job
     *
     * @param Job $job
     * @return \Symfony\Component\HttpFoundation\Response|static
     *
     * @Route("/jobs/{id}/delete")
     * @Method({"DELETE"})
     */
    public function deleteAction(Job $job)
    {
        $this->getDoctrine()->getManager()->remove($job);
        $this->getDoctrine()->getManager()->flush();

        return JsonResponse::create();
    }
}
