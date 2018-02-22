<?php

namespace AppBundle\Controller;

use AppBundle\Form\InputType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $data = [];

        $form = $this->createForm(InputType::class, [], [
            "method" => "POST",
            "action" => $this->generateUrl("homepage")
        ]);


        if($request->isMethod("POST")) {
            $form->handleRequest($request);

            if($form->isValid()) {
                $data = array_merge($data, $form->getData());
            }
        }

        $data["form"] = $form->createView();

        return $this->render('default/index.html.twig', $data);
    }
}
