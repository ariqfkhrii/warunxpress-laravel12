<?php

use Illuminate\Support\Str;

function formatProductName($product_name, $length)
{
    if (Str::length($product_name) > $length)
    {
        return Str::limit($product_name, $length - 3);
    } else {
        return $product_name;
    }
}

function formatProductDescription($product_description, $length)
{
    if(Str::length($product_description) > $length)
    {
        return Str::limit($product_description, $length - 3);
    } else {
        return $product_description;
    }
}

function formatCurrency($number, $type)
{
    switch ($type)
    {
        case 'IDR':
            return 'Rp ' . number_format($number, 2, ",", ".");
            break;
        default:
            break;
    }
}
