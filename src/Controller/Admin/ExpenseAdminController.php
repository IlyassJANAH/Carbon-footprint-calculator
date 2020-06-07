<?php
namespace App\Controller\Admin;

use App\Entity\Expense;
use App\Form\ExpenseType;
use App\Repository\ExpenseRepository;


use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExpenseAdminController extends AbstractController{

    /**
     * @var ExpenseRepository
     */
    private $repository;
    /**
     * @var ObjectManager
     */
    private $em;
    // il y a un probleme dans la version de doctrine-bundle que je travaille avec, du coup j'avais utilisé ManagerRegistry
    public function __construct(ExpenseRepository $repository, EntityManagerInterface $em)
    {

        $this->repository = $repository;
        $this->em = $em;
    }


    /**
     * @Route("/admin", name="admin.expense.index")
     */

    public function index(){

        $expenses = $this->repository->findAll();
        return $this->render('Admin/index.html.twig',compact('expenses'));
    }

    /**
     * @Route("/admin/expense/create", name ="admin.expense.new")
     * @param Request $request
     * @return Response
     */

    public function new(Request $request){
        $expense = new Expense();
        $form = $this->createForm(ExpenseType::class, $expense);
        $form->handleRequest($request); // handle request send by save button

        if ($form->isSubmitted() && $form->isValid()){
            $this->em->persist($expense);
            $this->em->flush();
            return $this->redirectToRoute('admin.expense.index');
        }

        return $this->render('Admin/new.html.twig',[
            'expense' => $expense,
            'form' => $form->createView()
        ]);

    }


    /**
     * @Route("/admin/expense/{id}", name="admin.expense.edit", methods="GET|POST")
     * @param Expense $expense
     * @param Request $request
     * @return Response
     */

    public function edit(Expense $expense, Request $request)
    {
        $form = $this->createForm(ExpenseType::class,$expense);// params : le type expense et l'entite qui contient les infos
        $form->handleRequest($request); // handle request send by save button

        if ($form->isSubmitted() && $form->isValid()){
            $this->em->flush();
            return $this->redirectToRoute('admin.expense.index');
        }

        return $this->render('Admin/edit.html.twig',[
            'expense' => $expense,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/expense/{id}", name="admin.expense.delete", methods="DELETE")
     * @param Expense $expense
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Expense $expense,Request $request){
        if ($this->isCsrfTokenValid('delete'.$expense->getId(),$request->get('_token'))){
            $this->em->remove($expense);
            $this->em->flush();
        }
        //
        //

        return $this->redirectToRoute('admin.expense.index');
    }
}
