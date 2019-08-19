<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ssheduardo\Redsys\Facades\Redsys;


$key = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';
$parameters = Redsys::getMerchantParameters($request->input('Ds_MerchantParameters'));
$DsResponse = $parameters["Ds_Response"];
$DsResponse += 0;

if (Redsys::check($key, $request->input()) && $DsResponse <= 99) {
    // lo que quieras que haya si es positiva la confirmación de redsys

} else {
    //lo que quieras que haga si no es positivo

}

?>