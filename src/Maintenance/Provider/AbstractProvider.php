<?php


namespace Maintenance\Provider;


use Maintenance\Options\ModuleOptionsInterface;
use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use Zend\Http\Response;
use Zend\Mvc\MvcEvent;

abstract class AbstractProvider extends AbstractListenerAggregate implements MaintenanceProviderInterface
{

    const REDIRECT_TYPE_FILE = 'file';
    const REDIRECT_TYPE_ROUTE = 'route';

    /**
     * Attach one or more listeners
     *
     * Implementors may add an optional $priority argument; the EventManager
     * implementation will pass this to the aggregate.
     *
     * @param EventManagerInterface $events
     *
     * @return void
     */
    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(MvcEvent::EVENT_BOOTSTRAP, array($this, 'onBootstrap'), 100);
    }

    /**
     * @param MvcEvent $event
     */
    public function onBootstrap(MvcEvent $event)
    {
        if (!$this->isMaintenance()) {
            return;
        }

        $serviceLocator = $event->getApplication()->getServiceManager();
        /** @var ModuleOptionsInterface $moduleOptions */
        $moduleOptions = $serviceLocator->get('Maintenance\Options\ModuleOptionsFactory');

        if ($moduleOptions->getRedirectType() == self::REDIRECT_TYPE_FILE) {
            $httpResponse = new Response();
            $httpResponse->getHeaders()->addHeader('Location', $moduleOptions->getRedirect());
            $httpResponse->setStatusCode(Response::STATUS_CODE_503);

            $event->setResponse($httpResponse);
            $event->stopPropagation(true);
        }

    }

    /**
     * @return bool
     */
    abstract public  function isMaintenance();
}