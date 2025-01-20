<?php
    function validate(array $fields) {
        foreach($fields as $field => $type) {
           $validate = [];

           switch($type) {
               case 's':
                   $validate[$field] = filter_input(INPUT_POST, $field, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                   break;
               case 'e':
                   $validate[$field] = filter_input(INPUT_POST, $field, FILTER_SANITIZE_EMAIL);
                   break;
               case 'i':
                   $validate[$field] = filter_input(INPUT_POST, $field, FILTER_SANITIZE_NUMBER_INT);
                   break;
               case 'f':
                   $validate[$field] = filter_input(INPUT_POST, $field, FILTER_SANITIZE_NUMBER_FLOAT);
                   break;
               default:
                   $validate[$field] = filter_input(INPUT_POST, $field, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                   break;
           }
        }
    }
?>