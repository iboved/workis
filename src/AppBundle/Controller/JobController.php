<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Job;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class JobController extends Controller
{
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
