<?php

namespace  app\classes;
class Assets
{

    public static function css($file_name_css)
    {
        return  THEME_PATH.'/assets/css/'. $file_name_css;
    }

    public static function image($file_name_image)
    {

        return  THEME_PATH.'/assets/img/'. $file_name_image;
    }

    public static function js($file_name_js)
    {
        return  THEME_PATH.'/assets/js/'. $file_name_js;
    }

}

