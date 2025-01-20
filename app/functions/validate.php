<?php
    function validate(array $fields) {
        foreach($fields as $field => $type) {
           switch($type) {
               case 's':
                   if (!isset($_POST[$field]) || strlen($_POST[$field]) == 0) {
                       return false;
                   }
                   break;
               case 'e':
                   if (!filter_var($_POST[$field], FILTER_VALIDATE_EMAIL)) {
                       return false;
                   }
                   break;
               case 'i':
                   if (!filter_var($_POST[$field], FILTER_VALIDATE_INT)) {
                       return false;
                   }
                   break;
               case 'b':
                   if (!filter_var($_POST[$field], FILTER_VALIDATE_BOOLEAN)) {
                       return false;
                   }
                   break;
               case 'f':
                   if (!filter_var($_POST[$field], FILTER_VALIDATE_FLOAT)) {
                       return false;
                   }
                   break;
               case 'url':
                   if (!filter_var($_POST[$field], FILTER_VALIDATE_URL)) {
                       return false;
                   }
                   break;
               case 'ip':
                   if (!filter_var($_POST[$field], FILTER_VALIDATE_IP)) {
                       return false;
                   }
                   break;
               default:
                   return false;
           }
        }
    }
?>