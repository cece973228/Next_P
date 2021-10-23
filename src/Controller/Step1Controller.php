<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Step1Controller extends AbstractController
{
    /**
     * @Route("/step1", name="step1")
     */
    public function step1(): Response
    {
        return $this->render('Synchronisation/step1/step1.html.twig');
    }
}
