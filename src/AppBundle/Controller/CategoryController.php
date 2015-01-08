<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{
    /**
     * This method render jobs and resumes with a certain category
     *
     * @param Category $category
     * @param $slug
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("categories/{slug}")
     * @Method({"GET"})
     */
    public function listAction(Category $category, $slug)
    {
        $jobs = $this->getDoctrine()->getRepository('AppBundle:Job')->findByCategory($category->getId());
        $resumes = $this->getDoctrine()->getRepository('AppBundle:Resume')->findByCategory($category->getId());

        return $this->render('category/list.html.twig', [
            'jobs' => $jobs,
            'resumes' => $resumes
        ]);
    }

    /**
     * This method delete category and related entities
     *
     * @param Category $category
     * @return \Symfony\Component\HttpFoundation\Response|static
     *
     * @Route("/categories/{slug}/delete")
     * @Method({"DELETE"})
     */
    public function deleteAction(Category $category)
    {
        $this->getDoctrine()->getManager()->remove($category);
        $this->getDoctrine()->getManager()->flush();

        return JsonResponse::create();
    }
}
