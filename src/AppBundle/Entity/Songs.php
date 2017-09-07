<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Songs
 *
 * @ORM\Table(name="songs", indexes={@ORM\Index(name="title", columns={"title"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SongsRepository")
 */
class Songs
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=85, nullable=false)
     */
    private $title = '';

    /**
     * @var string
     *
     * @ORM\Column(name="authors", type="string", length=85, nullable=false)
     */
    private $authors = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="gema", type="integer", nullable=false)
     */
    private $gema;

    /**
     * @var string
     *
     * @ORM\Column(name="publisher", type="string", length=85, nullable=true)
     */
    private $publisher;

    /**
     * @var string
     *
     * @ORM\Column(name="lyrics", type="string", length=85, nullable=true)
     */
    private $lyrics;

    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="string", length=2, nullable=true)
     */
    private $lang;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=85, nullable=true)
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="mp3", type="string", length=85, nullable=true)
     *
     * @Assert\NotBlank(message="Please, upload a valid mp3-file.")
     * @Assert\File(mimeTypes={ "audio/mpeg","application/octet-stream" })
     */
    private $mp3;

    /**
     * @var integer
     *
     * @ORM\Column(name="recording", type="integer")
     */
    private $recording;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="year", type="integer", nullable=false)
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="band", type="string", length=25, nullable=true)
     */
    private $band;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * @param string $authors
     */
    public function setAuthors($authors)
    {
        $this->authors = $authors;
    }

    /**
     * @return string
     */
    public function getGema()
    {
        return $this->gema;
    }

    /**
     * @param string $gema
     */
    public function setGema($gema)
    {
        $this->gema = $gema;
    }

    /**
     * @return string
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @param string $publisher
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * @return string
     */
    public function getLyrics()
    {
        return $this->lyrics;
    }

    /**
     * @param string $lyrics
     */
    public function setLyrics($lyrics)
    {
        $this->lyrics = $lyrics;
    }

    /**
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param string $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getMp3()
    {
        return $this->mp3;
    }

    /**
     * @param string $mp3
     */
    public function setMp3($mp3)
    {
        $this->mp3 = $mp3;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getRecording()
    {
        return $this->recording;
    }

    /**
     * @param int recording
     */
    public function setRecording($recording)
    {
        $this->recording = $recording;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return string
     */
    public function getBand()
    {
        return $this->band;
    }

    /**
     * @param string $band
     */
    public function setBand($band)
    {
        $this->band = $band;
    }


}

