<?php

// src/Controller/CalculatorControllerller.php

namespace App\Controller;

use App\Entity\Expense;
use App\Repository\ExpenseRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{

    /**
     * @var ExpenseRepository
     */
    private $repository;

    public function __construct(ExpenseRepository $repository, EntityManagerInterface $em)
    {

        $this->repository = $repository;

    }

    /**
     * @Route("/", name="calculator")
     */
    public function index()
    {

        $expenses = $this->repository->findAll();
        return $this->render('Calculator/index.html.twig',compact('expenses'));
    }




}