<?php

use Illuminate\Http\Request;

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api'
], function($api) {
    // 短信验证码
    $api->get('version', function() {
      return response('this is version v1 test...');
  });

  $api->get('country', 'CountryController@list')->name('api.CountryController.list');

  $api->get('states/{country}', 'CountryController@statelist')->name('api.CountryController.statelist');
  $api->get('cities/{state}', 'CountryController@citylist')->name('api.CountryController.statelist');


});
