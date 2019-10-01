<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        $articleRepos = $this->getDoctrine()->getRepository(Article::class);

        $articles = $articleRepos->findAll();
        
        //dd($articles);
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles' => $articles
        ]);
    }
    /**
     * @Route("/blog/show/{id}", name="blog_show")
     */
    public function show(Article $article){
        return $this->render('blog/show.html.twig', [
            'article' => $article
        ]);
    }
    /**
     * @Route("/blog/article", name="blog_article")
     */
    public function article(){
        return $this->render('blog/article.html.twig', []);
    }
}

