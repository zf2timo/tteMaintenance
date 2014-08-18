<?php

namespace tteMaintenance\Provider;

use tteMaintenance\Options\ModuleOptionsInterface;
use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use Zend\Http\PhpEnvironment\Response;
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
        $this->listeners[] = $events->attach(MvcEvent::EVENT_ROUTE, array($this, 'onBootstrap'), -10000);
    }

    /**
     * @param MvcEvent $event
     * @return \Zend\Stdlib\ResponseInterface|void
     */
    public function onBootstrap(MvcEvent $event)
    {
        if (!$this->isMaintenance()) {
            return;
        }

        $serviceLocator = $event->getApplication()->getServiceManager();
        /** @var ModuleOptionsInterface $moduleOptions */
        $moduleOptions = $serviceLocator->get('tteMaintenance\Options\ModuleOptionsFactory');


        if ($moduleOptions->getRedirectType() == self::REDIRECT_TYPE_FILE) {
            $redirectLink = $moduleOptions->getRedirect();
        } elseif ($moduleOptions->getRedirectType() == self::REDIRECT_TYPE_ROUTE) {
            $router = $serviceLocator->get('httpRouter');
            $redirectLink = $router->assemble(array(), array('name' => $moduleOptions->getRedirect()));
        }

        $httpResponse = $event->getResponse();
        if ($httpResponse instanceof Response) {
            $httpResponse->setStatusCode(Response::STATUS_CODE_302);
            $httpResponse->getHeaders()->addHeaderLine('Location', $redirectLink);
            return $httpResponse;
        }

        // @todo at the moment the module only supports HTTP-Request
        return;
    }

    /**
     * @return bool
     */
    abstract public  function isMaintenance();
}