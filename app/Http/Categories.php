<?php
/**
 * Created by PhpStorm.
 * User: oluwayemisioduye
 * Date: 8/2/17
 * Time: 12:11 PM
 */

namespace App\Http;


class Categories
{
    public static function getCategories() {
        $categories = [
            'Devices',
            'Clothing',
            'Health',
            'Others'
        ];

        return $categories;
    }
}