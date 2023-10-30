<?php

class AddressBook {
    
    public static function getList()
    {
        $result = include_template_with_headers(APP_PATH . '/views/list-addresses.php', [
            'addresses' => Address::all(),
            'cities' => City::all()
        ]);

        return $result;
    }

    public static function getAddressById($id)
    {
        return Address::getById($id);
    }

    public static function getAddressDataToExport()
    {
        return Address::allWithCityName();
    }

    public static function addAddress()
    {
        $address = new Address();
        $success = $address->create($_POST);
        if($success) {         
            $html = include_template(APP_PATH . '/views/list-addresses.php', [
                'addresses' => Address::all(),
                'cities' => City::all(),
            ]);

            $responce = [
                'success' => 1,
                'html' => $html
            ];
        } else {
            $responce = [
                'success' => 0
            ];
        }

        return $responce;
    }

    public static function updateAddress() {
        $address = new Address();
        $success = $address->update($_POST);

        $responce = [
            'success' => $success,
            'html' => include_template(APP_PATH . '/views/list-addresses.php', [
                'addresses' => Address::all(),
                'cities' => City::all(),
            ])
        ];

        return $responce;
    }
    
}