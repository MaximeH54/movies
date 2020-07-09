<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Knp\Component\Pager\PaginatorInterface;

use App\Entity\Movies;
use App\Controller\MoviesController;


class MoviesController extends AbstractController
{
    /**
     * @Route("/movies", name="movies")
     */
    public function index(PaginatorInterface $paginator, Request $request)
    {
        $movies = $this->getDoctrine()
         ->getRepository(Movies::class)
         ->findBy([], ['name' => 'ASC']);

		     $pagination = $paginator->paginate(
		       $movies, // Requête contenant les données à paginer (ici nos articles)
		       $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
		       18 // Nombre de résultats par page
		     );

		     return $this->render('movies/index.html.twig', [
		       'categories' => $pagination,
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
