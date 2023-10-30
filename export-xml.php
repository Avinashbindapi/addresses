<?php

include_once(__DIR__ . '/initialize.php');

if (is_ajax_request()) {
    $addresses = AddressBook::getAddressDataToExport();
    
    $xml = new SimpleXMLElement('<addresses/>');

    foreach ($addresses as $address) {
        $entry = $xml->addChild('address');
        $entry->addChild('first_name', $address['first_name']);
        $entry->addChild('last_name', $address['last_name']);
        $entry->addChild('email', $address['email']);
        $entry->addChild('street', $address['street']);
        $entry->addChild('zip_code', $address['zip_code']);
        $entry->addChild('city_name', $address['city_name']);
    }

    header('Content-Type: application/xml');
    echo $xml->asXML();
    die;
}