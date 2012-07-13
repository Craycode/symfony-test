<?php

namespace Piotr\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

	public function indexAction($name)
	{
		return $this->render('PiotrHelloBundle:Default:index.html.twig',
				array('name' => $name));
	}

	public function sayAction($name)
	{
		return $this->render('PiotrHelloBundle:Say:hello.html.twig',
				array('name' => $name));
	}

}
