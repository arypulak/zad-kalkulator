<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\aarypulakPolekwadratuType;
use aarypulak\Tools\Polekwadratu;
use Symfony\Component\HttpFoundation\Request;


class aarypulakPolekwadratuController extends Controller
{

    /**
     * @Route("/aarypulak/polekwadratu/show/form", name="aarypulak_polekwadratu_show_form")
     */
    public function showFormAction()
    {
        $polekwadratu = new Polekwadratu();
        $form = $this->createCreateForm($polekwadratu);

        return $this->render(
            'AppBundle:aarypulakPolekwadratu:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }

    /**
     * @Route("/aarypulak/polekwadratu/calc", name="aarypulak_polekwadratu_result")
     * @Method("POST")
     */
    public function calculateAction(Request $request)
    {
        $polekwadratu = new Polekwadratu();
        $form = $this->createCreateForm($polekwadratu);
        $form->handleRequest($request);

        if ($form->isValid()) {

            return $this->render(
                'AppBundle:aarypulakPolekwadratu:result.html.twig',
                array('result' => $polekwadratu->polekwadratu())
            );

        }

        return $this->render(
            'AppBundle:aarypulakPolekwadratu:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }

    /**
     * Creates a form...
     *
     * @param Polekwadratu $polekwadratu The object
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Polekwadratu $polekwadratu)
    {
        $form = $this->createForm(new aarypulakPolekwadratuType(), $polekwadratu, array(
            'action' => $this->generateUrl('aarypulak_polekwadratu_result'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Calculate'));

        return $form;
    }


}