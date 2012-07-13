<?php

namespace Piotr\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SayController extends Controller
{

	public function indexAction($name)
	{
		return $this->render('PiotrHelloBundle:Default:index.html.twig',
				array('name' => $name));
	}

	public function sayAction($name)
	{
		{# Uses: input.id, input.label, input.class, input.name #}
			$formfields = array();
			$formfields[] = array(
				'id' => 'name',
				'label' => 'Name',
				'class' => 'form-name',
				'name' => 'name'
			);
			$formfields[] = array(
				'id' => 'tel',
				'label' => 'Telephone no.',
				'class' => 'form-tel',
				'name' => 'tel'
			);
			
			$urlList = array(
				'test!',
				'something',
				'Brian',
				'Soup'
			);

			return $this->render(
					'PiotrHelloBundle:Say:hello.html.twig',
					array(
					'name' => $name,
					'url_self' => $this->get('router')->generate('_piotr',
						array('name' => 'Piotr Suwik')),
					'form_fields' => $formfields,
					'urlList' => $urlList,
					)
			);
		}
	}

	public function getNumbersAction()
	{
		$numbers = array();

		for ($i = 0; $i < 10; $i++)
		{
			$numbers[] = rand(0, 1000);
		}

		return $this->render('PiotrHelloBundle::templates/numbersList.html.twig',
				array('numbers' => $numbers));
	}

}

