<?php

namespace App\DTO\Transformer\ResultSearchResponseTransformer;

use App\DTO\Response\SearchResponseDto;
use App\DTO\Response\SearchContentResponseDto;
use App\Entity\MtnCars;
use DateTime;

class ResultSearchContentResponseDtoTransformer
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
        $aOCars = [];
        foreach ($aResultFromDB as $key => $oCar) {
            # code...
            $aOCars [] = $this->transformResultContentSearchResponseObject($oCar);
        }

        return $aOCars;
    }

    /**
     * creation nw Objet du body result content
     *
     * @return void
     */
    public function transformResultContentSearchResponseObject(MtnCars $oCar)
    {
        $oRTypeSearch = new SearchContentResponseDto();
        
        $oRTypeSearch->reference = $oCar->getReference(); //
        $oRTypeSearch->marque = $oCar->getMarque(); //
        $oRTypeSearch->modele = $oCar->getModele();
        $oRTypeSearch->boiteDeVitesse = $oCar->getBoitedevitessevoiture();
        $oRTypeSearch->miseEnCirculation = $oCar->getMiseencirculation();
        $oRTypeSearch->photos = $oCar->getPhotominiature();
        $oRTypeSearch->prix = $oCar->getPrixvoiture();

        return $oRTypeSearch;
    }

}