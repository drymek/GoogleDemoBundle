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
        $map->setTemplating($this->get('templating'));
        $map->setId("demo-map");

        $marker = new Marker();
        $marker->setLatitude(50.294492);
        $marker->setLongitude(18.67138);
        $marker->setMeta(array(
            'label' => 'x',
            'infowindow' => "<div>TEST</div>"
        ));
        $map->addMarker($marker);

        $marker = new Marker();
        $marker->setLatitude(50.267848);
        $marker->setLongitude(19.036560);
        $marker->setMeta(array(
            'infowindow' => '<div><b>TEST</b></div>',
        ));
        $map->addMarker($marker);

        $this->get('google.maps')->addMap($map);

        /*
        $map2 = new Map();
        $map2->setTemplating($this->get('templating'));
        $map2->setId("demo-map-click");

        $marker = new Marker();
        $marker->setLatitude(50.294492);
        $marker->setLongitude(18.67138);
        $map2->setCenter($marker);
        $this->setZoom(10);

        $this->get('google.maps')->addMap($map2);
        */
        return $this->render('AcmeGoogleDemoBundle:Default:index.html.twig', array(
        ));
    }
}
