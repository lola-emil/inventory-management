<?php

function validateProduct($name, $qty, $price) {

    if (!$name || !$price || empty(trim($name)))
        return "Fill all the required fields";
    
    if (!$qty || $qty < 1)
        return "Quantity must be at least 1";

    if (strlen($name) > 50)
        return "Name must not exceed 50 characters";
    
    if (!filter_var($qty, FILTER_VALIDATE_INT))
        return "'qty' must be a number";


    if (!filter_var($price, FILTER_VALIDATE_FLOAT))
        return "'price' must be a number";

    
    return null;    
}