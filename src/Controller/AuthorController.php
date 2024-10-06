<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthorController extends AbstractController
{
    private $authors;
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }
    #[Route('/showAuthor/{name}', name: 'app_show',defaults:['name'=>'victor hugo'], methods:['GET'])]
    public function showAuthor($name): Response
    {
        return $this->render('author/show.html.twig', [
            'name' => $name
        ]);
    }
    public function __construct(){
        $this->authors = [

            ['id' => 1, 'picture' => '/images/ws.png', 'username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com', 'nb_books' => 100],
      
            ['id' => 2, 'picture' => '/images/ws.png', 'username' => 'William Shakespeare', 'email' => 'william.shakespeare@gmail.com', 'nb_books' => 200],
      
            ['id' => 3, 'picture' => '/images/ws.png', 'username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300],
      
          ];
    }
    #[Route('/listAuthor', name: 'app_show', methods:['GET'])]
    public function listAuthor(): Response
    {
        return $this->render('author/showAuthors.html.twig', [
            'authors'=> $this->authors
        ]);
    }
    #[Route('/authorDetail/{id}', name: 'author_details', methods:['GET'])]
    public function authorDetail($id): Response
    {   
        $index = $id - 1;

        if (isset($this->authors[$index])) {
            $author = $this->authors[$index];
    
            return $this->render('author/detail.html.twig', [
                'author' => $this->authors[$index]
            ]);
        } else {
            return new Response("Author not found", 404);
        }

    }
}
