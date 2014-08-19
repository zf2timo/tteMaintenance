<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace tteMaintenance;

use tteMaintenance\Exception\MisconfigurationException;
use tteMaintenance\Options\ModuleOptionsInterface;
use tteMaintenance\Provider\MaintenanceProviderInterface;
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
                __DIR__  . '/src/tteMaintenance/autoload_classmap.php',
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
        $serviceLocator = $app->getServiceManager();

        $eventManager        = $app->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $moduleOptions      = $serviceLocator->get('tteMaintenance\Options\ModuleOptionsFactory');
        $provider           = $moduleOptions->getMaintenanceProvider();

        if (count($provider) > 0) {
            foreach ($provider as $instance) {
                if ($serviceLocator->has($instance)) {
                    $eventManager->attach($serviceLocator->get($instance));
                }
            }
        }
    }
}
