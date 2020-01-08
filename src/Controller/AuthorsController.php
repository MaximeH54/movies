<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Authors;
use App\Controller\AuthorsController;

class AuthorsController extends AbstractController
{
    /**
     * @Route("/authors", name="authors")
     */
    public function index()
    {
      $authors = $this->getDoctrine()
        ->getRepository(Authors::class)
        ->findBy([], ['name'=>'ASC'], 20);

        return $this->render('authors/index.html.twig', [
            'authors' => $authors,

        ]);
    }
}
