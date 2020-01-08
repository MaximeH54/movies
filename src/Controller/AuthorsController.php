<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Authors;

class AuthorsController extends AbstractController
{
    /**
     * @Route("/authors", name="movies")
     */
    public function index()
    {
      $authors = $this->getDoctrine()
        ->getRepository(Authors::class)
        ->findBy([], ['name'=>'ASC'], 20, 0);

        return $this->render('movies/index.html.twig', [
            'author' => $authors,

        ]);
    }
}
