<?php

namespace AppBundle\Twig\Extension;



class TwigExtension extends \Twig_Extension
{

    /**
     * Return the functions registered as twig extensions
     *
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('file_exists', 'file_exists'),
            new \Twig_SimpleFunction('str_replace', 'str_replace'),
        );
    }

    public function getName()
    {
        return 'app_file';
    }
}
?>