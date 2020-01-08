<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Movies;
use App\Form\MoviesType;

class MovieController extends AbstractController
{
    /**
     * @Route("/movies", name="admin_movie_add")
     */
    public function add(Request $request)
    {
        $movie = new Movies;
        $form = $this->createForm(MoviesType::class, $movie);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           // $form->getData() holds the submitted values
           // but, the original `$task` variable has also been updated
          $movie = $form->getData();
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->persist($movie);
          $entityManager->flush();
        }

        return $this->render('admin/movies/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
