<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/list", name="api_list")
     */
     
    public function list(ProductRepository $productRepository)
    {
        return $this->json([
            'status_code' => 200,
            'data' => $productRepository->findAll()
        ]);
    }
}
