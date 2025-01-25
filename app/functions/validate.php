<?php
function validate(array $fields) {
    $request = request();
    $validate = [];

    foreach ($fields as $field => $type) {
        if (isset($request[$field])) {
            switch ($type) {
                case 's':
                    $validate[$field] = filter_var($request[$field], FILTER_DEFAULT);
                    break;
                case 'e':
                    $validate[$field] = filter_var($request[$field], FILTER_SANITIZE_EMAIL);
                    break;
                case 'i':
                    $validate[$field] = filter_var($request[$field], FILTER_SANITIZE_NUMBER_INT);
                    break;
                case 'f':
                    $validate[$field] = filter_var($request[$field], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    break;
                default:
                    $validate[$field] = filter_var($request[$field], FILTER_DEFAULT);
                    break;
            }
        }
    }

    return (object) $validate;
}

function isEmpty() {
    $request = request();
    $isEmpty = false;

    foreach ($request as $key => $value) {
        if (empty($value)) {
            $isEmpty = true;
        }
    }

    return $isEmpty;
}

?>