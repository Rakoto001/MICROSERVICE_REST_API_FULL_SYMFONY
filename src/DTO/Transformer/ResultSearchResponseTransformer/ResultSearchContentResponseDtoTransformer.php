<?php

namespace App\DTO\Transformer\ResultSearchResponseTransformer;

use DateTime;
use App\Entity\MtnCars;
use App\Entity\MatrixCars;
use App\DTO\Response\SearchResponseDto;
use App\DTO\Response\SearchContentResponseDto;

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
    public function transformResultContentSearchResponseObject($oCar)
    {
        $oRTypeSearch = new SearchContentResponseDto();

        if ( $oCar instanceof MtnCars ) {

            $oRTypeSearch->reference = $oCar->getReference(); //
            $oRTypeSearch->marque = $oCar->getMarque(); //
            $oRTypeSearch->modele = $oCar->getModele();
            $oRTypeSearch->boiteDeVitesse = $oCar->getBoitedevitessevoiture();
            $oRTypeSearch->miseEnCirculation = $oCar->getMiseencirculation();
            $oRTypeSearch->photos = $oCar->getPhotominiature();
            $oRTypeSearch->km = $oCar->getNombredekmvoiture();
            $oRTypeSearch->nombrePlace = $oCar->getNombredeportes();
            $oRTypeSearch->prix = $oCar->getPrixvoiture();

        } 
else {

            $oRTypeSearch->reference = $oCar->getReference(); //
            $oRTypeSearch->marque = $oCar->geTbrandIndex(); //
            $oRTypeSearch->modele = $oCar->getModelIndex();
            $oRTypeSearch->boiteDeVitesse =  $oCar->getVehicule()->getGearbox();
            $oRTypeSearch->miseEnCirculation = $oCar->getPublicationDate();
            $oRTypeSearch->photos = $oCar->getEmail(); // par défaut aucune infos sur  photos, remplacé par mail
            $oRTypeSearch->km = 0;
            $oRTypeSearch->nombrePlace = 1;
            $oRTypeSearch->prix = 200;


        }
        
       

        return $oRTypeSearch;
    }

}