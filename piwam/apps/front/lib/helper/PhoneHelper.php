<?php
function format_phonenumber($phonenumber)
{
    if (strlen($phonenumber) === 10)
    {
        $result  = substr($phonenumber, 0, 2) . '.' . substr($phonenumber, 2, 2) . '.';
        $result .= substr($phonenumber, 4, 2) . '.' . substr($phonenumber, 6, 2) . '.';
        $result .= substr($phonenumber, 8, 2);

        return $result;
    }

    return $phonenumber;
}
?>