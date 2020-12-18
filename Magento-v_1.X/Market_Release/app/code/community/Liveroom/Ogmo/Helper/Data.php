<?php

class Liveroom_Ogmo_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getLink($sku)
    {
        $base_url = "https://api.dev.ogmo.xyz/magento/plugin?";
        $paraArray = array(
                    'sku' => $sku,
                    'host' => $_SERVER['HTTP_HOST']
                     );

        $para = http_build_query($paraArray);
        $feed_url = $base_url.$para;
        try
        {
            $curl = new Varien_Http_Adapter_Curl();
            $curl->setConfig(array(
                'timeout'   => 4   //timeout in no of seconds
                            ));
            $curl->write(Zend_Http_Client::GET, $feed_url, '1.0');
            $response = $curl->read();

            $cod = Zend_Http_Response::extractCode($response); 
            if ($cod == null) {
                throw new Exception("Unable to get successful Response, can't connect with request API or timeout error occurred");
            }

            $tmp = preg_split('/^\r?$/m', $response, 2);
            $data = trim($tmp[1]);
            
            $curl->close();

            $obj = json_decode($data);
            

            if($obj != null)
            {
                $state = $obj->status;
                
                if ($state == 200)
                {
                    $link = $obj->url;
                    return $link;
                }
                else
                {
                    $link = null;
                    return $link;
                }
            }
            else
            {
                $link = null;
                return $link;
            }   
        } 
        catch (Exception $e) 
        {
            $detail = array('Exception : Message' => $e->getMessage(), 'Exception : File' => $e->getFile(), 'Exception : Line' => $e->getLine());
            Mage::log($detail , null, 'ogmo.log');
        }
    }
}
