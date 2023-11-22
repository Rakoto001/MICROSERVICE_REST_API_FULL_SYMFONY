<?php

namespace App\DTO\Transformer\ResultSearchResponseTransformer;

use DateTime;
use App\Entity\MtnCars;
use App\Entity\MatrixCars;
use App\DTO\Response\SearchResponseDto;
use App\DTO\Response\SearchContentResponseDto;
use App\DTO\Response\SearchProductContentResponseDto;
use App\Entity\Product;
use App\Entity\Produit;

class ResultSearchProductContentResponseDtoTransformer
{
    public function __construct() {
        // $this->var = $var;
    }

    /**
     * iteration sur les resultats des requetes et les modifients en tant que objet output body
     *
     * @param array $aResultFromDB
     * @return void
     */
    public function transformAllResultContentSearchResponseObject($aResultFromDB = [])
    {
        $aProducts = [];
        foreach ($aResultFromDB as $key => $oProducts) {
            
            $aProducts [] = $this->transformResultContentSearchResponseObject($oProducts);
        }

        return $aProducts;
    }

    /**
     * creation nw Objet du body result content
     *
     * @return void
     */
    public function transformResultContentSearchResponseObject($oProducts)
    {
        $oRTypeSearch = new SearchProductContentResponseDto();

        if ( $oProducts instanceof Produit ) {

            $oRTypeSearch->nom = $oProducts->getNom();
            $oRTypeSearch->prix = $oProducts->getPrix();

        } 

       
        
       

        return $oRTypeSearch;
    }

}