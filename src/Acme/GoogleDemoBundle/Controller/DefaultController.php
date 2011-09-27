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
        $map->setId("demo-map");

        $marker = new Marker();
        $marker->setLatitude(50.294492);
        $marker->setLongitude(18.67138);
        $marker->setMeta(array(
            'label' => 'x',
            'infoWindow' => "<div>TEST</div>"
        ));
        $map->addMarker($marker);

        $marker = new Marker();
        $marker->setLatitude(50.267848);
        $marker->setLongitude(19.036560);
        $map->addMarker($marker);
        $map->setZoom(10);

        $this->container->get('google.maps')->addMap($map);

        return $this->render('AcmeGoogleDemoBundle:Default:index.html.twig', array(
        ));
    }
}
