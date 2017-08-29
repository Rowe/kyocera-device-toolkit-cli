<?php

namespace rowe\printerHelper;

/**
 * Created by PhpStorm.
 * User: kyocera
 * Date: 2017/8/11
 * Time: 17:27
 */

use rowe\printerHelper\NetPrinter;

class KyoceraPrinter extends NetPrinter
{

    private $_requestUrl;


    public function restart()
    {
        echo 'restarting...';
    }

    public function wakeUp()
    {

    }


    public function getDeviceInfo()
    {
        $host = $this->getHost();
        $httpRequest = [
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
            'http' => [
                'method' => 'POST',
                'protocol_version' => 1.1,
                'header' => [
                    'Host: {$host}:9090',
                    'Content-Type: application/soap+xml; charset=utf-8; action="http://www.kyoceramita.com/ws/km-wsdl/information/device_information/get_device_constitution_information"',
                    'Connection: close',
                    'KMDEVINF_SOAPAction:  "http://www.kyoceramita.com/ws/km-wsdl/information/device_information/get_device_constitution_information"',
                ],

                'content' => '<?xml version="1.0" encoding="UTF-8" ?>
                <SOAP-ENV:Envelope
                    xmlns:SOAP-ENV="http://www.w3.org/2003/05/soap-envelope"
                    xmlns:SOAP-ENC="http://www.w3.org/2003/05/soap-encoding"
                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                    xmlns:xsd="http://www.w3.org/2001/XMLSchema"
                    xmlns:c14n="http://www.w3.org/2001/10/xml-exc-c14n#"
                    xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd"
                    xmlns:xenc="http://www.w3.org/2001/04/xmlenc#"
                    xmlns:wsc="http://schemas.xmlsoap.org/ws/2005/02/sc"
                    xmlns:ds="http://www.w3.org/2000/09/xmldsig#"
                    xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd"
                    xmlns:xop="http://www.w3.org/2004/08/xop/include"
                    xmlns:discovery="http://schemas.xmlsoap.org/ws/2005/04/discovery"
                    xmlns:eventing="http://schemas.xmlsoap.org/ws/2004/08/eventing"
                    xmlns:wsa="http://www.w3.org/2005/08/addressing"
                    xmlns:kmdevinf="http://www.kyoceramita.com/ws/km-wsdl/information/device_information">
                    <SOAP-ENV:Header>
                    <wsa:To>http://' . $host . ':9090/ws/km-wsdl/information/device_information</wsa:To>
                    <wsa:Action>http://www.kyoceramita.com/ws/km-wsdl/information/device_information/get_device_constitution_information</wsa:Action>
                    </SOAP-ENV:Header>
                    <SOAP-ENV:Body>
                    <kmdevinf:get_device_constitution_informationRequest>
                    </kmdevinf:get_device_constitution_informationRequest>
                    </SOAP-ENV:Body>
                    </SOAP-ENV:Envelope>
                '
            ]
        ];

        $context = stream_context_create($httpRequest);

        $dstAddr = 'http://' . $host . ':9090/ws/km-wsdl/information/device_information';
        return @file_get_contents($dstAddr, false, $context);
    }


    public function userAuth()
    {

    }

    public function userLogout()
    {

    }

    public function getPanelMessage()
    {
        $rst = $this->getDeviceInfo();

        xml_parse_into_struct(xml_parser_create(), $rst, $values);


        print_r($this->getValueByTagName($values, 'KMDEVINFO:MESSAGE'));
    }

    private function getValueByTagName($array, $tagName)
    {
        foreach ($array as $arr) {
            if ($arr['tag'] == $tagName) {
                return $arr['value'];
            }
        }
    }


    public function toner()
    {

    }
}