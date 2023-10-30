<?php

if(isset($_GET['page']) && $_GET['page'] == 'group'){
    if (is_ajax_request()) {
        header('Content-Type: application/json');
        if(isset($_GET['group_id'])){
            $data = AddressBook::getAddressById($_GET['id']);
        }elseif(isset($_POST['id'])){
            $data = AddressBook::updateAddress();
        }elseif(isset($_GET['get_json'])){
            $data = AddressBook::getAddressDataToExport();
        }else{
            $data = GroupManager::getList();
        }
        echo json_encode($data);
        die;
    } else {
        echo GroupManager::getList();
    }
}else{
    if (is_ajax_request()) {
        header('Content-Type: application/json');
        if(isset($_GET['id'])){
            $data = AddressBook::getAddressById($_GET['id']);
        }elseif(isset($_POST['id'])){
            $data = AddressBook::updateAddress();
        }elseif(isset($_GET['get_json'])){
            $data = AddressBook::getAddressDataToExport();
        }else{
            $data = AddressBook::addAddress();
        }
        echo json_encode($data);
        die;
    } else {
        echo AddressBook::getList();
    }
}