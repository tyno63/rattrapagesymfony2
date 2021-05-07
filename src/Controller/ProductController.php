<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ProductRepository;
use App\Entity\Produits;

class ProductController extends AbstractController
{
    /**
     * @Route("/", name="product")
     */
    public function list(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();

        return $this->render('products/list.html.twig', [
             'products' => $products
        ]);
    }

    /**
     * @Route("/add-product", name="product_add")
     */
    public function add(Request $request, EntityManagerInterface $entityManager)
    {
        if ($request->getMethod() === 'POST') {
            $produits = new Produits();
            $produits->setName($request->request->get('name'));
            $produits->setQuantity($request->request->get('quantity'));

            $entityManager->persist($produits);
            $entityManager->flush();

            return $this->redirect('/');
        }

        return $this->render('products/add.html.twig');
    }
}
