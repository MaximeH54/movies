<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movies;
use App\Controller\MoviesController;


class MoviesController extends AbstractController
{
    /**
     * @Route("/movies", name="movies")
     */
    public function index()
    {
        $movies = $this->getDoctrine()
         ->getRepository(Movies::class)
         ->findBy([], ['name' => 'ASC'], 20, 0);

        return $this->render('movies/index.html.twig', [
          'movies' => $movies,
        ]);


      /**$movies = $this->getDoctrine()
        ->getRepository(Movies::class)
        ->createQueryBuilder('a')
        ->where('a.name LIKE :name')
        ->setParameter('name', '%'.$findBy['name'].'%')
        ->orderBy('a.' . $orderBy, $asc ? 'ASC' : 'DESC')
        ->setMaxResults(self::LIMIT)
        ->setFirstResult($offset)
        ->getQuery()
        ->execute(); */
    }

    /**
     * @Route("/movie/{id}", name="movie_detail")
     */
    public function moviesDetail($id)
    {
        $movieDetail = $this->getDoctrine()
        ->getRepository(Movies::class)
        ->find($id);

        return $this->render('movies/moviesDetail.html.twig', [
            'movieDetail' => $movieDetail,
        ]);
    }
}
