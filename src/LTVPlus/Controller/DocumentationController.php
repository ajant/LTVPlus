<?php

declare(strict_types=1);

namespace LTVPlus\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig_Environment;

class DocumentationController
{
    /**
     * @var Twig_Environment
     */
    private $twig;

    public function __construct(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function get(): Response
    {
        return new Response($this->twig->render('Documentation/doc.html'), Response::HTTP_OK);
    }
}
