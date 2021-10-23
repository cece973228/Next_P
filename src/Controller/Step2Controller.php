<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Step2Controller extends AbstractController
{
    /**
     * @Route("/step2", name="step2")
     */
    public function step2(): Response
    {
        return $this->render('Synchronisation/step2/step2.html.twig');
    }
}
