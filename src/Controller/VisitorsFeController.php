<?php

/**
 * @copyright  Glen Langer 2017 <http://contao.ninja>
 * @author     Glen Langer (BugBuster)
 * @package    Visitors
 * @license    LGPL-3.0+
 * @see	       https://github.com/BugBuster1701/contao-visitors-bundle
 */

namespace BugBuster\VisitorsBundle\Controller;

use BugBuster\Visitors\FrontendVisitors;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Handles the Visitors front end routes.
 *
 * @copyright  Glen Langer 2017 <http://contao.ninja>
 * @author     Glen Langer (BugBuster)
 *
 * @Route("/visitors", defaults={"_scope" = "frontend", "_token_check" = false})
 */
class VisitorsFeController extends Controller
{
    /**
     * Renders the alerts content.
     *
     * @return Response
     *
     * @Route("/screencount", name="visitors_frontend_screencount")
     */
    public function screencountAction()
    {
        $this->container->get('contao.framework')->initialize();
    
        $controller = new FrontendVisitors();
    
        return $controller->run();
    }
}
