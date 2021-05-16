<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    /**
     * @Route("/post", name="post")
     */

class PostController extends AbstractController
{
    /**
     * @Route("/", name="_browse")
     */
    public function browse(PostRepository $postRepository): Response
    {
        // L'idée c'est d'afficher que le posts généraux, mias je n'ai pas encore de relations.
        // Il faut penser à la pagination aussi.
        // $posts = $postRepository->findBy(
        //     A completer
        //     ['' => '']
        
        // );

        $posts = $postRepository->findAll();

        dd($posts);

        return $this->render('post/browse.html.twig', [
            'posts' => $posts,
        ]);
    }


    /**
     * @Route("/add", name="_add")
     */
    public function add(Request $request, PostRepository $postRepository): Response
    {
        $post = new Post();
        
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()){


            $post->setContent($form->get('content')->getData());


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($post);
            $entityManager->flush();
            
            $this->addFlash('success', 'L\'évènement a été créée');
            
            return $this->redirectToRoute('post_browse');


        }
        
        

        return $this->render('post/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
