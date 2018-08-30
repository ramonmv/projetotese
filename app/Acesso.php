<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Acesso extends Model
{
    //

//  $local = \Location::get("187.36.19.34");   //=====
// Position {#196 ▼
//   +countryName: ""
//   +countryCode: "BR"
//   +regionCode: ""
//   +regionName: "Rio Grande do Sul"
//   +cityName: "Porto Alegre"
//   +zipCode: null
//   +isoCode: ""
//   +postalCode: ""
//   +latitude: "-30.0333"
//   +longitude: "-51.2000"
//   +metroCode: ""
//   +areaCode: ""
//   +driver: "Stevebauman\Location\Drivers\IpInfo"
// }

    // $ip = \Request::ip();
    // $Position = \Location::get("187.36.19.34");
    // $user_id = auth()->id();

    // $doc_id = auth()->id();

    // //https://github.com/hisorange/browser-detect
    // $dataPosition = \Request::server('HTTP_USER_AGENT'); x
    // $dataPosition = \Request::header('User-Agent'); 
    // $dataPosition = \Browser::browserFamily(); //Chrome   x
    // $dataPosition = \Browser::platformFamily(); //"GNU/Linux" x
    // $dataPosition = \Browser::platformName(); //n x
    // $dataPosition = \Browser::deviceFamily(); //n x
    // $dataPosition = \Browser::deviceModel(); //n x
    // $dataPosition = \Browser::browserName(); //"Chrome 68.0.3440"
    // $dataPosition = \Browser::isChrome(); // true
    // $dataPosition2 = \Browser::isDesktop(); // true
    // $Acesso = new Acesso();
    // $Acesso->add(1,1,1,1);

  // dd($dataPosition->regionName);


	public function salvarInicioLeitura($doc_id)

	{    	 

		$this->salvar($doc_id, 1);

	}


	public function salvarFimLeitura($doc_id)
	
	{    	 

		$this->salvar($doc_id, 2);

	}



	public function salvar($doc_id, $tipo)

	{    	 
		$this->unguard();

	 	$ip = \Request::ip();
  		// $Position = \Location::get($ip);
  		$Position = \Location::get("52.67.24.16");
  		
		return $this->create([

			'logon'=> auth()->check(), 
			'user_id' => auth()->id(),
			'ip'=> $ip,
			'detalhes' => \Request::server('HTTP_USER_AGENT'),

			'deviceFamily' => \Browser::deviceFamily(),
			'deviceModel' => \Browser::deviceModel(),
			'isDesktop' => \Browser::isDesktop(),

			'so' => \Browser::platformFamily(),
			'plataforma' => \Browser::platformName(),
			
			'browser' => \Browser::browserFamily(),
			'browserVersion' => \Browser::browserName(),
			'isChrome' => \Browser::isChrome(),
			
		
			'latitude' => $Position->latitude,
			'longitude' => $Position->longitude,			
			'cidade' => $Position->cityName,
			'uf' => $Position->regionName,
			'pais'=> $Position->countryCode,
			
			'tipo_id'=> $tipo,
			'doc_id' =>  $doc_id

		]);

	}




}
