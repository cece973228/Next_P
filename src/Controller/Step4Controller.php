<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Step4Controller extends AbstractController
{
    /**
     * @Route("/step4", name="step4")
     */
    public function step4(): Response
    {
        return $this->render('Synchronisation/step4/step4.html.twig');
    }
}
