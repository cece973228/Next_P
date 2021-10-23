<?php

namespace App\Controller;

use App\Entity\UserNextp;
use App\Form\RegistrationFormType;
use App\Repository\UserNextpRepository;
use App\Security\EmailVerifier;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class RegistrationController extends AbstractController
{
    private $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasherInterface): Response
    {
        $user = new UserNextp();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasherInterface->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // generate a signed url and email it to the user
            // $this->emailVerifier->sendEmailConfirmation(
            //     'app_verify_email',
            //     $user,
            //     (new TemplatedEmail())
            //         ->from(new Address('cedricdu973@gmail.com', 'Next P Bot'))
            //         ->to($user->getId())
            //         ->subject('Please Confirm your Email')
            //         ->htmlTemplate('registration/confirmation_email.html.twig')
            // );
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/verify/email", name="app_verify_email")
     */
    //     public function verifyUserEmail(Request $request, UserNextpRepository $userNextpRepository): Response
    //     {
    //         $id = $request->get('id');

    //         if (null === $id) {
    //             return $this->redirectToRoute('app_register');
    //         }

    //         $user = $userNextpRepository->find($id);

    //         if (null === $user) {
    //             return $this->redirectToRoute('app_register');
    //         }

    //         // validate email confirmation link, sets User::isVerified=true and persists
    //         try {
    //             $this->emailVerifier->handleEmailConfirmation($request, $user);
    //         } catch (VerifyEmailExceptionInterface $exception) {
    //             $this->addFlash('verify_email_error', $exception->getReason());

    //             return $this->redirectToRoute('app_register');
    //         }

    //         // @TODO Change the redirect on success and handle or remove the flash message in your templates
    //         $this->addFlash('success', 'Your email address has been verified.');

    //         return $this->redirectToRoute('home');
    //     }
}
