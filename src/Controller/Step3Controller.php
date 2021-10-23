<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Step3Controller extends AbstractController
{
    /**
     * @Route("/step3", name="step3")
     */
    public function index(): Response
    {
        return $this->render('Synchronisation/step3/step3.html.twig');
    }
}
