<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Maintenance;

use Maintenance\Exception\MisconfigurationException;
use Maintenance\Options\ModuleOptionsInterface;
use Maintenance\Provider\MaintenanceProviderInterface;
use Zend\EventManager\EventInterface;
use Zend\Feed\PubSubHubbub\HttpResponse;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module implements AutoloaderProviderInterface, BootstrapListenerInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__  . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    // if we're in a namespace deeper than one level we need to fix the \ in the path
                    __NAMESPACE__ => __DIR__ . '/src/' . str_replace('\\', '/' , __NAMESPACE__),
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__  . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return include __DIR__ . '/config/service.config.php';
    }

    public function onBootstrap(EventInterface $e)
    {
        /* @var $app \Zend\Mvc\ApplicationInterface */
        $app             = $e->getTarget();

        $eventManager        = $app->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $moduleOptions      = $app->getServiceManager()->get('Maintenance\Options\ModuleOptionsFactory');
        $provider           = $moduleOptions->getMaintenanceProvider();

        foreach ($provider as $instance) {
           $eventManager->attach($instance);
       }


//        $eventManager->attach('loadModules.post', function(EventInterface $e) {
//            /** @var \Zend\Mvc\ApplicationInterface $app */
//            $app = $e->getTarget();
//            $serviceManager = $app->getServiceManager();
//
//            /** @var ModuleOptionsInterface $options */
//            $options = $serviceManager->get('Maintenance\Options\ModuleOptionsFactory');
//            $provider = $options->getMaintenanceProvider();
//
//            $isMaintenance = false;
//            if ($provider instanceof \Closure) {
//                $isMaintenance = (bool)$provider();
//            } elseif (is_string($provider)) {
//                $provider = $serviceManager->get($provider);
//                if ($provider instanceof MaintenanceProviderInterface) {
//                    $isMaintenance = $provider->isMaintenance();
//                }
//            }
//            else {
//                throw new MisconfigurationException('error');
//            }
//
//            if ($isMaintenance) {
//                $e->stopPropagation(true);
//                $response = new HttpResponse();
//
//            }
//
//        }, 100);
    }
}
