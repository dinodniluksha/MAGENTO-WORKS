<?php

class Liveroom_Ogmo_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getLink($sku)              //API call for getting viewer link of relevant product
    {
        $base_url = "https://3x4ialaxef.execute-api.us-east-1.amazonaws.com/dev/plugin?";
        $paraArray = array(
                    'sku' => $sku,
                    'host' => $_SERVER['HTTP_HOST']
                     );

        $para = http_build_query($paraArray);
        $feed_url = $base_url.$para;

        echo '<script>';
        echo 'console.log("'. $feed_url .'")';  //to console.log()
        echo '</script>';

        try
        {
            $curl = new Varien_Http_Adapter_Curl();
            $curl->setConfig(array(
                'timeout'   => 3   //timeout in no of seconds
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
                echo '<script>';
                echo 'console.log("'. "empty response" .'")';  //to console.log()
                echo '</script>';

                $link = null;
                return $link;
            }   
        } 
        catch (Exception $e) 
        {
            $detail = array('Exception : Message' => $e->getMessage(), 'Exception : File' => $e->getFile(), 'Exception : Line' => $e->getLine());
            Mage::log($detail , null, 'ogmo.log');

            return 'https://app.ogmo.xyz/public/viewer/index.html?id=5bfb829c6a0840240aebd7b7';
        }
    }
}
