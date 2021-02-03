<?php

namespace Liveroom\Ogmo\Helper;
use \Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{

       
              // $request = new \Zend\Http\Request();
              // $request->setUri('https://88o4orxeqd.execute-api.eu-central-1.amazonaws.com/dev/magento/link');
              // $request->setMethod(\Zend\Http\Request::METHOD_GET);

              // $client = new \Zend\Http\Client();

              // $options = [
              //        'adapter'   => 'Zend\Http\Client\Adapter\Curl',
              //        'maxredirects' => 0,
              //        'timeout' => 30
              //      ];

              // $client->setOptions($options);

              // $response = $client->send($request);




              protected $zendClient;
              

              public function __construct(

                     \Zend\Http\Client $zendClient
                     
              ) {
       
        $this->zendClient = $zendClient;
    }

       public function getlink()
       {

              try 
              {
                     $this->zendClient->reset();
                     $this->zendClient->setUri('https://88o4orxeqd.execute-api.eu-central-1.amazonaws.com/dev/magento/link');
                     $this->zendClient->setMethod(\Zend\Http\Request::METHOD_GET);
                     $this->zendClient->setOptions(array(
                            'timeout' => 1
                     ));
                     

                     $this->zendClient->send();

                     
                     $response = $this->zendClient->getResponse();

                     
                     $tmp = preg_split('/^\r?$/m', $response, 2);
                     $dat = trim($tmp[1]);

                     $obj = json_decode($dat);

                     
                     if($obj != null)
                     {
                            $state = $obj->status;
                            
                            if ($state == 200)
                            {
                                   echo '<script>';
                                   echo 'console.log('. json_encode($obj) .')';  //to console.log()
                                   echo '</script>';
                            
                                   $link = $obj->url;

                                   echo '<script>';
                                   echo 'console.log("'. $link .'")';  //to console.log()
                                   echo '</script>';

                                   
                                   return $link;
                            }
                            else
                            {
                                   echo '<script>';
                                   echo 'console.log('. json_encode($obj) .')';  //to console.log()
                                   echo '</script>';
                                   
                                   $link = null;
                                   return $link;
                            
                            }
                     }
                     else
                     {
                            // echo '<script>';
                            // echo 'console.log("'. "empty response" .'")';  //to console.log()
                            // echo '</script>';

                            //$link = 'https://app.ogmo.xyz/public/viewer/index.html?id=5bfb829c6a0840240aebd7b7';
                            $link = null;
                            return $link;
                     }  

              }
              catch (\Zend\Http\Exception\RuntimeException $runtimeException) 
              {
                     echo '<script>';
                     echo 'console.log("'. $runtimeException->getMessage() .'")';  //to console.log()
                     echo '</script>';

                     $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/ogmo.log');
                     $logger = new \Zend\Log\Logger();
                     $logger->addWriter($writer);
                     $logger->info($runtimeException->getMessage());

                     $link = 'https://app.ogmo.xyz/public/viewer/index.html?id=5bfb829c6a0840240aebd7b7';
                     //$link = null;
                     return $link;
              }

       }

}