<?php

namespace App\WebService\Correios;

class Rastreio{

    /**
     * URL base dos serviços da API de rastreio
     * @var string
    */
    const URL_BASE = 'https://proxyapp.correios.com.br';

    /**
     * Método responsavel por realizar a consulta no endpoint dos correios
     * @param String $codigo
     * @return array
    */
    public static function consultarRastreio($codigo){
        // INICIA O CURL
        $curl = curl_init();

        // CONFIGURA A REQUISIÇÃO DO CURL
        curl_setopt_array($curl, [
            CURLOPT_URL => self::URL_BASE.'/v1/sro-rastro/'.strtoupper($codigo),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ]);

        //RESPONSE
        $response = curl_exec($curl);

        // FECHA A CONEXÃO DO CURL
        curl_close($curl);

        // RETORNO DOS DADOS EM ARRAY
        return json_decode($response,true);
    }
}