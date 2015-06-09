<?php

namespace Workshop\Bundle\AclBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Workshop\Bundle\AclBundle\Entity\User;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserController
 * @package Workshop\Bundle\AclBundle\Controller
 */
class UserController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction(Request $request)
    {
        $user = new User();
        $form = $this->createFormBuilder($user)
            ->add('username')
            ->add(
                'password',
                'password'
            )
            ->add(
                'role',
                'choice',
                array(
                    'choices' => array(
                        'role1' => 'role1',
                        'role2' => 'role2',
                        'role3' => 'role3',
                    ),
                )
            )
            ->add('save', 'submit', array('label' => 'Login'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $session = new Session();
            $session->set('role', $form['role']->getData());

            return $this->redirect($this->generateUrl($form['role']->getData()));
        }

        return $this->render(
            'WorkshopAclBundle:User:login.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function role1Action()
    {
        $this->checkRole('role1');

        return $this->render('WorkshopAclBundle:User:role1.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function role2Action()
    {
        $this->checkRole('role2');

        return $this->render('WorkshopAclBundle:User:role2.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function role3Action()
    {
        $this->checkRole('role3');

        return $this->render('WorkshopAclBundle:User:role3.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function errorAction()
    {
        return $this->render('WorkshopAclBundle:User:error.html.twig');
    }

    /**
     *
     * @param string $role
     * @return bool
     */
    public function checkRole($role)
    {
        $session = new Session();
        if ($session->get('role') === $role) {
            return true;
        }
        throw $this->createNotFoundException('404');
    }
}
