<?php

namespace App\Controller;

use App\Repository\ProfessionalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProsController extends AbstractController
{
    private $em;
    private $proRepository;

    public function __construct(EntityManagerInterface $em, ProfessionalRepository $proRepository)
    {
        $this->em = $em;
        $this->proRepository = $proRepository;
    }

    #[Route('/pros', name: 'app_pros_index')]
    public function index(): Response
    {
        $pros = $this->proRepository->findAll();

        return $this->render('pros/index.html.twig', compact($pros));
    }
}
