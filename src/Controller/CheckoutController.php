<?php

namespace App\Controller;

use App\Form\CheckoutFormType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;


class CheckoutController extends AbstractController
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }
    /**
     * @Route("/check_out", name="check_out")
     */
    public function index(Request $request, ProductRepository $productRepository, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(CheckoutFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            $checkoutFormData = $form->getData();

            $cart = $this->session->get("Cart", array());
            $Products = array();

            foreach ($cart as $id => $product) {
                array_push($Products, ["Aantal" => $product["Aantal"], "Product" => $productRepository->find($id)]);
            }

            $message = (new \Swift_Message($checkoutFormData["subject"]))
                ->setFrom('1031412@mborijnland.nl')
                ->setReplyTo('1031412@mborijnland.nl')
                ->setTo($checkoutFormData['email'])
                ->setBody(
                    $this->renderView(
                        'emails/checkout.html.twig',
                        ["Naam" => $checkoutFormData["name"], "Products" => $Products, "Message" => $checkoutFormData["message"]]
                    ), 'text/html'
                );

            $mailer->send($message);

            $this->session->set("Cart", array());

            return $this->redirectToRoute('check_out');
        }

        return $this->render('check_out/index.html.twig', [
            'controller_name' => 'CheckOutController',
            'our_form' => $form->createView()
        ]);
    }
}
