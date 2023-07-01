<?php

namespace Flynt\Utils;

class JavascriptData
{
    public static function setDataObject(array $data_obj, string $componentName)
    {
        $obj_name = $componentName . 'Data';

        if (!empty($data_obj)) {
            wp_localize_script('Flynt/assets', $obj_name, $data_obj);
        }

        return true;
    }
}
