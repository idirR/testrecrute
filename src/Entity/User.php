<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 *@UniqueEntity(
* fields={"email"},
*message="le maile que vous avez insirer est deja utiliser"
 *)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *@ Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     *@Assert\Length(min=8, minMessage="Votre mot de passe doit faire minimum 8 caracteres")
     */
    private $password;
    /**
     * @Assert\EqualTo(propertyPath="password",message="votre mot de passe doit etre le meme")
     */

    public $confirm_password;

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }
    public function eraseCredentials(){}
    public function getUsername(){}
    public function getSalt(){}
    public function getRoles(){
        return['ROLE_USER'];
    }
}
