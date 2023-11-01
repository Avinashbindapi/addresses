<?php

class AddressBook {
    
    public static function getList()
    {
        $result = include_template_with_headers(APP_PATH . '/views/list-addresses.php', [
            'addresses' => Address::all(),
            'cities' => City::all(),
            'groups' => Group::all(),
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
        $addressId = $address->create($_POST);
        
            $groupId = $_POST['group_id'];

        $success = $address->addressToGroup($groupId, $addressId);
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

            $addressId = $_POST['id'];
            $groupId = $_POST['group_id'];

        $address->addressToGroup($groupId, $addressId);
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