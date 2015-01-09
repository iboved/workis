<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Form\Type\CategoryType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{
    /**
     * This method create new category
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @Route("categories/new")
     * @Method({"GET","POST"})
     */
    public function newAction(Request $request)
    {
        $category = new Category();

        $form = $this->createForm(new CategoryType(), $category);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->persist($category);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirect($this->generateUrl('app_default_index'));
        }

        return $this->render('category/new.html.twig', ['form' =>  $form->createView()]);
    }

    /**
     * This method edit category
     *
     * @param Request $request
     * @param Category $category
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @Route("/categories/{slug}/edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Category $category)
    {
        $form = $this->createForm(new CategoryType(), $category);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->persist($category);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirect($this->generateUrl('app_default_index'));
        }

        return $this->render('category/edit.html.twig', ['form' =>  $form->createView()]);
    }

    /**
     * This method render jobs and resumes with a certain category
     *
     * @param Category $category
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("categories/{slug}")
     * @Method({"GET"})
     */
    public function listAction(Category $category)
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
