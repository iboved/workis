<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Job;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/jobs")
 */
class JobController extends Controller
{
    /**
     * This method render all jobs
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/")
     * @Method({"GET"})
     */
    public function listAction()
    {
        $jobs = $this->getDoctrine()->getManager()->getRepository('AppBundle:Job')->findAll();

        return $this->render('job/list.html.twig', ['jobs' => $jobs]);
    }

    /**
     * This method render one job
     *
     * @param Job $job
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/{id}")
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
     * @Route("/{id}/delete")
     * @Method({"DELETE"})
     */
    public function deleteAction(Job $job)
    {
        $this->getDoctrine()->getManager()->remove($job);
        $this->getDoctrine()->getManager()->flush();

        return JsonResponse::create();
    }
}
