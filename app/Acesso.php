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
    // $dataPosition = \Request::server('HTTP_USER_AGENT');
    // $dataPosition = \Request::header('User-Agent');
    // $dataPosition = \Browser::browserFamily(); //Chrome  
    // $dataPosition = \Browser::platformFamily(); //"GNU/Linux"
    // $dataPosition = \Browser::platformName(); //n
    // $dataPosition = \Browser::deviceFamily(); //n
    // $dataPosition = \Browser::deviceModel(); //n
    // $dataPosition = \Browser::browserName(); //"Chrome 68.0.3440"
    // $dataPosition = \Browser::isChrome(); // true
    // $dataPosition2 = \Browser::isDesktop(); // true
    // $Acesso = new Acesso();
    // $Acesso->add(1,1,1,1);

  // dd($dataPosition->regionName);


	public function add($device, $so, $web, $user_id)

	{    

	 	$ip = \Request::ip();
  		$local = \Location::get($ip);
  		
  		// dd(auth()->id());

		return $this->create([

			'logon'=> Auth::check(), 
			'user_id' => auth()->id(),
			'ip'=> $ip,
			'detalhes' => \Request::server('HTTP_USER_AGENT'),

			'device' => $user_id,
			'desktop' => \Browser::isDesktop(),

			'so' => \Browser::platformFamily(),
			'browser' => \Browser::browserFamily(),

			
			'latitude' => $latitude->latitude,
			'longitude' => $latitude->longitude,			
			'cidade' => $Position->cityName,
			'uf' => $Position->regionName,
			'pais'=> $Position->countryCode,
			
			'tipo_id'=> $user_id,
			'doc_id' =>  $user_id

		]);

	}
}
