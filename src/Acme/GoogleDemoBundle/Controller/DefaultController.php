<?php

namespace Acme\GoogleDemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AntiMattr\GoogleBundle\Maps\JavascriptMap as Map;
use AntiMattr\GoogleBundle\Maps\Marker;

class DefaultController extends Controller
{
    /**
     * @Route("/google")
     */
    public function indexAction()
    {
        $map = new Map();
        $map->setId("Demo");
        $marker = new Marker();
        $marker->setLatitude(40.596631);
        $marker->setLongitude(-73.972359);
        $map->addMarker($marker);
        $this->container->get('google.maps')->addMap($map);

        return $this->render('AcmeGoogleDemoBundle:Default:index.html.twig', array(
        ));
    }
}
