<?php
/**
 * Created by PhpStorm.
 * User: smartnet
 * Date: 21.12.17
 * Time: 1:48
 */

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\DBAL\Driver\Connection;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class MainController extends Controller
{

    /**
     * @Route("/", name="index")
     */
    public function index(Request $request, Connection $conn) {

//        $users = $conn->fetchAll('SELECT * FROM users');

        $form = $this->createFormBuilder()
            ->add('task', TextType::class)
            ->add('dueDate', DateType::class)
            ->getForm();

//        return $this->render('main/index.html.twig', [
//            'users' =>  $users
//        ]);
        return $this->render('main/new.html.twig', [
            'form' => $form->createView(),
        ]);

    }

}