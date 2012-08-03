<?php

namespace Piotr\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Piotr\HelloBundle\Entity\Product;

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

			$product = new Product();
			$product->setName('testproduct');
			$product->setDescription('this is test product');
			$product->setPrice(13.50);
			$category = $this->getDoctrine()->getEntityManager()->getRepository('PiotrHelloBundle:Category')->findOneBy(array('name'=>'phone'));
			$category = $category ? $category : new \Piotr\HelloBundle\Entity\Category('phone');
			//$category = new \Piotr\HelloBundle\Entity\Category('phone');
			$product->setCategory($category);
			$em = $this->getDoctrine()->getEntityManager();
			$em->persist($category);
			$em->persist($product);
			$em->flush();
			
			$products = $this->getDoctrine()->getRepository('PiotrHelloBundle:Product')->findAll();

			return $this->render(
					'PiotrHelloBundle:Say:hello.html.twig',
					array(
					'name' => $name,
					'url_self' => $this->get('router')->generate('_piotr',
						array('name' => 'Piotr Suwik')),
					'form_fields' => $formfields,
					'urlList' => $urlList,
					'added_product' => $product,
					'products' => $products
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

