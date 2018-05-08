<?php
/**
* Simple autoloader, so we don't need Composer just for this.
*/
class Autoloader_90090921412432342309480238409823094
{
    /**
     * @return bollean
     */
    public static function register_291390812354345345()
    {
        spl_autoload_register(function ($class) {
            $file = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
            if (file_exists(sqb_dir. $file)) {
                require sqb_dir . $file;
                return true;
            }
            return false;
        });
    }
}
Autoloader_90090921412432342309480238409823094::register_291390812354345345();