<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=85, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="passwd", type="string", length=85, nullable=false)
     */
    private $passwd = '';

    /**
     * @var boolean
     *
     * @ORM\Column(name="read", type="boolean", nullable=false)
     */
    private $read = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="write", type="boolean", nullable=false)
     */
    private $write = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

