<?php

namespace Acme\GoogleDemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AntiMattr\GoogleBundle\Maps\Marker;
use AntiMattr\GoogleBundle\MapsManager;

class DefaultController extends Controller
{
    /**
     * @Route("/google")
     */
    public function indexAction()
    {
        // FIRST MAP
        $map = $this->get('google.maps')->create(MapsManager::MAP_JAVASCRIPT, 'demo-map');

        /**
         * Add first marker
         */
        $marker = new Marker();
        $marker->setLatitude(50.294492);
        $marker->setLongitude(18.67138);
        $marker->setMeta(array(
            'infowindow' => "<div>TEST</div>"
        ));
        $map->addMarker($marker);

        /**
         * Add second marker
         */
        $marker = new Marker();
        $marker->setLatitude(50.267848);
        $marker->setLongitude(19.036560);
        $marker->setMeta(array(
            'infowindow' => '<div><b>TEST</b></div>',
        ));
        $map->addMarker($marker);

        // Fit map to markers
        $map->setFitToMarkers(true);

        $this->get('google.maps')->addMap($map);

        // SECOND MAP
        $map2 = $this->get('google.maps')->create(MapsManager::MAP_JAVASCRIPT, 'demo-map-click');

        $callback = 'function (element) { 
            debugger;
            alert("Longitude: "+element.lng());
            alert("Latitude: "+element.lat());
        }';
        $map2->setClickCallback($callback);


        // Set map center
        $marker = new Marker();
        $marker->setLatitude(50.294492);
        $marker->setLongitude(18.67138);
        $map2->setCenter($marker);
        $map2->setZoom(10);

        $this->get('google.maps')->addMap($map2);

        return $this->render('AcmeGoogleDemoBundle:Default:index.html.twig');
    }
}
