<?php

namespace App\Services\Serializer;

use FOS\RestBundle\Context\Context;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use JMS\Serializer\SerializationContext;
use FOS\RestBundle\Serializer\Serializer;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;


class JmsCamelCaseService implements Serializer
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
     * @return string
     */
    public function serialize($data, string $format, Context $context)
    {
        dd('inside');
       $jmsContext = $this->getJmsContext($context);

      $results = ($this->serializer->serialize($data, $format, $jmsContext));

      return $results;

    }

    public function deserialize(string $data, string $type, string $format, Context $context)
    {

        return null;

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