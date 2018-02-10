<?php
/**
 * Created by PhpStorm.
 * User: samy
 * Date: 10/02/2018
 * Time: 23:18
 */

namespace App\Listener;


use App\Entity\User;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserListener
{

    private $passwordEncoder;
    private $mailer;
    private $twig;


    public function __construct(UserPasswordEncoderInterface $passwordEncoder,\Swift_Mailer $mailer, \Twig_Environment $twig )
    {

        $this->passwordEncoder = $passwordEncoder;
        $this->mailer= $mailer;
        $this->twig = $twig;

    }

    /*
     *
     * Crypter le mot de passe
     *
     */
    public function prePersist(User $user, LifecycleEventArgs $args){

        // Récupérer le mot de passe en clair
        $password = $user->getPassword();

        // Cryptage du mot de passe
        $passwordEncoded = $this->passwordEncoder->encodePassword($user,$password);
        // Modification du mot de passe
        $user->setPassword($passwordEncoded);

    }

    /*
     *
     * Envoi Email de bienvenue
     *
     *
     */

    public function postPersist(User $user, LifecycleEventArgs $eventArgs){



    }



}