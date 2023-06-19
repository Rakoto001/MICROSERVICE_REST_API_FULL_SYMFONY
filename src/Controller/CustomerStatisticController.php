<?php

declare(strict_types = 1);


namespace App\Controller;

use App\Entity\Customer;
// use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Context\Context;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Handler\HandlerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\DTO\Transformer\CustomerResponseDtoTransformers;
use App\Services\Serializer\DTOSerializerService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/api", name="api_")
 */
// class CustomerStatisticController extends AbstractApiController
class CustomerStatisticController extends AbstractFOSRestController
{
    private $serializer;
    private $ownSerializer;
    
    public function __construct(SerializerInterface $serializer, DTOSerializerService $ownSerializer) {
        // $this->serializer = $serializer;
        $this->serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(new IdenticalPropertyNamingStrategy())
            ->configureHandlers(function(HandlerRegistry $registry) {
                $registry->registerHandler(
                    200, 'DateTime', 'json',
                    function($visitor, \DateTime $date, array $type) {
                        return $date->format("d/m/Y");
                    }
                );
            })
            ->build()
        ;

        $this->ownSerializer = $ownSerializer;
    }
    /**
     * @Rest\Get("/customer/statistic", name="app_customer_statistic")
     * @Rest\View(serializerGroups={"app_customer"})
     */
    public function indexAction(CustomerResponseDtoTransformers $customerDto, Request $request)
    {
        $customers = $this->getDoctrine()->getRepository(Customer::class)->findAll();
        $customer = reset($customers);

        // $this->ownSerializer->serialize($customer, 'json');
        // dd($this->getView());

        /** function dans AbstractApiController*/
        $customer = $customerDto->transformFromObject($customer);
        // return $this->respond($customer);
        /** function dans AbstractApiController*/



        /** simulation avec new COntext */
        // $context = new Context();
        // $context->setGroups(["app_customer", "app_read"]);
        
        // $jmsContext = $this->getJmsContext($context) ;
        
        // $presonalzedNormalization = $this->serializer->serialize($customer, 'json', $jmsContext);

        // return new Response('test');

        return $customer;

    }




    /**
     * prendre les groups dans le Context
     *
     * @param [type] $context
     * @return void
     */
    private function getJmsContext($context) {

        if ((!$context || empty($context))) {
            $jmsContext = null;
        } else if ($context) {

            if ($context instanceof Context) {

                if (empty($context->getGroups()))
                    $jmsContext = null ;
                else
                    $jmsContext = SerializationContext::create()->setGroups($context->getGroups());

            } else {
                $jmsContext = SerializationContext::create()->setGroups($context);
            }

        }

        return $jmsContext ;

    }
}
