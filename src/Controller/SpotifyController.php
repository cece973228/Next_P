<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SpotifyController extends AbstractController
{
    /**
     * @Route("/spotify", name="spotify")
     */
    public function index(): Response
    {
        return $this->render('spotify/spotify.html.twig', [
            'client_id' => 'df6968c34f4b4494ac206c7628d2afc7',
        ]);
    }
}
