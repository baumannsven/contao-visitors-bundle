<?php

declare(strict_types=1);

/*
 * This file is part of a BugBuster Contao Bundle
 *
 * @copyright  Glen Langer 2022 <http://contao.ninja>
 * @author     Glen Langer (BugBuster)
 * @package    Contao Visitors Bundle
 * @license    LGPL-3.0-or-later
 * @see        https://github.com/BugBuster1701/contao-visitors-bundle
 */

namespace BugBuster\VisitorsBundle\Controller;

use BugBuster\Visitors\FrontendVisitors;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Handles the Visitors front end routes.
 *
 * @copyright  Glen Langer 2017 <http://contao.ninja>
 *
 * @Route("/visitors", defaults={"_scope" = "frontend", "_token_check" = false})
 */
class VisitorsFeController extends AbstractController
{
    /**
     * Renders the alerts content.
     *
     * @return Response
     *
     * @Route("/scco", name="visitors_frontend_screencount")
     */
    public function sccoAction()
    {
        $this->get('contao.framework')->initialize();

        $controller = new FrontendVisitors();

        return $controller->run();
    }
}
