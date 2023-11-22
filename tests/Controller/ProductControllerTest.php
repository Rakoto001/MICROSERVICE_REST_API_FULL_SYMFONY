<?php

namespace App\Test\Controller;

use App\Entity\Produit;
use PHPUnit\Framework\TestCase;
use ApiTestCase\JsonApiTestCase;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ProductController extends JsonApiTestCase
{

 

    public function testNew(){
        
        // https://github.com/lchrusciel/ApiTestCase
        $results = $this->client->request('GET', '/api/product/details/2', [], [], ['HTTP_HOST' => 'localhost:8000'] );
        $response = $this->client->getResponse();
        $oResponse = current(json_decode($response->getContent()));
        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame('Produit2', $oResponse[0]->nom);

        
    }
    
}