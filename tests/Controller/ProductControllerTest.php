<?php

namespace App\Test\Controller;

use App\Entity\Produit;
use Guzzle\Http\Client;
use PHPUnit\Framework\TestCase;
use ApiTestCase\JsonApiTestCase;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ProductController extends JsonApiTestCase
{

    protected $client;
    const HOST = 'localhost:8000';
    const ENNTRY_POINT_NEW = '/api/product/new';
    const ENTRY_POINT_DETAILS = '/api/product/details';

    public function testResponseApi()
    {
        
        // https://github.com/lchrusciel/ApiTestCase
        $results = $this->client->request('GET', self::ENTRY_POINT_DETAILS.'/2', [], [], ['HTTP_HOST' => self::HOST] );
        $response = $this->client->getResponse();
        $oResponse = current(json_decode($response->getContent()));
        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame('Produit2', $oResponse[0]->nom);
        
    }

    public function testNewProductApi()
    {

        $this->client->jsonRequest('POST', self::ENNTRY_POINT_NEW,  [
            'nom' => 'user0@example.com',
            'prix' => 12,
        ],['HTTP_HOST' => self::HOST] );


        $this->assertSame('Produit sauvegardé', $this->client->getResponse()->getContent());
        $this->assertSame(200, $this->client->getResponse()->getStatusCode());




        // // dd($this->client->getResponse()); pour les  diff resp
        // dd($this->client->getResponse()->getContent());// pour les  diff resp

    }


    
    
}