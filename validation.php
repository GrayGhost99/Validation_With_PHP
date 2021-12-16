<?php

namespace Validation;

//Validate the length of a string, returning an error message
//or a blank string; parmeters passed by value
function stringValid($val, $len)
{
    if (strlen($val) < $len)
        return  'Must be at least ' . $len . ' characters.';
    else
        return '';
}

//Validate an IP address using the built-in PHP IP address
//format vlidator; pass a message back through the parameter
//passed by reference
function ipValid($val, &$msg)
{
    if (strlen($val) > 0) {
        if (!filter_var($val, FILTER_VALIDATE_IP))
            $msg = "Not a valid IP address.";
    }
}

//Validate a phone number using REGEX; the REGEX to use 
//may be provided or may use the default format provided
//in the parameter
function phoneValid($val, $regex = "/^\d{3}-\d{3}-\d{4}$/")
{
    if (strlen($val) > 0) {
        if (!preg_match($regex, $val))
            return "Invalid format.";
        else
            return '';
    }
}

//Validate that a value is numeric; throw an exception if
//the value is not numeric - note the use of \Exception to
//indicate the Exception class is not from the Validation
//namespace
function numericValue($val)
{
    if (!is_numeric($val)) {
        throw new \Exception('Not a valid number');
    }
}
