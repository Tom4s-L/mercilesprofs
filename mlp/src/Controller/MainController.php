<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    /**
     * @Route("/", name="main")
     */

class MainController extends AbstractController
{
    /**
     * @Route("", name="_home")
     */
    public function home(Request $request, PaginatorInterface $paginator, PostRepository $postRepository): Response
    {
        if ($this->getUser()) {

            $posts = $postRepository->findBy([
                'receiver' => $this->getUser()
            ]);

        } else {

            $posts = $postRepository->findBy([
                'receiver' => null
            ]);

        }

        $posts = $paginator->paginate(
            $posts,
            $request->query->getInt('page', 1) , 10
        );

        return $this->render('main/home.html.twig', [
            'posts' => $posts,
        ]);
    }

}
