<?php

class GroupManager {
    
    public static function getList()
    {
        $result = include_template_with_headers(APP_PATH . '/views/list-group.php', [
            'groups' => Group::getByParentId()
        ]);

        return $result;
    }

    public static function getGroupById($id)
    {
        return Address::getById($id);
    }

    public static function addGroup()
    {
        $group = new Group();
        $success = $group->create($_POST);
        if($success) {         
            $html = include_template(APP_PATH . '/views/list-group.php', [
                'addresses' => Address::all(),
                'cities' => City::all(),
            ]);

            $response = [
                'success' => 1,
                'html' => $html
            ];
        } else {
            $response = [
                'success' => 0
            ];
        }

        return $response;
    }

}