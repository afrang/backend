<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class SendSmsController extends Controller
{
   static function sendingsms($number,$msg){

        ini_set("soap.wsdl_cache_enabled", "0");
        $sms_client = new \SoapClient('http://payamak-service.ir/SendService.svc?wsdl', array('encoding'=>'UTF-8'));

        try {
            $parameters['userName'] = "d.alinaseri68";
            $parameters['password'] = "Ali3871027";
            $parameters['fromNumber'] = "10009193871027";
            $parameters['toNumbers'] = array($number);
            $parameters['messageContent'] = $msg;
            $parameters['isFlash'] = false;
            $recId = array(0);
            $status = 0x0;
            $parameters['recId'] = &$recId ;
            $parameters['status'] = &$status ;
            echo $sms_client->SendSMS($parameters)->SendSMSResult;
        }
        catch (Exception $e)
        {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}
