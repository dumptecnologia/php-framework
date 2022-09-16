<?php

namespace Dump;

use Composer\Script\Event;

class ComposerScripts
{
    private static $root = __DIR__;

    private static $autoload = __DIR__ . '/autoload.php';

    private static $files = [
        'Reflection/functions.php'
    ];

    public static function postAutoloadDump(Event $event): void
    {
        $rootPackage = $event->getComposer()->getPackage();

        $autoloadDefinition = $rootPackage->getAutoload();
        self::writeStaticAutoloader();
        $autoloadDefinition['files'][] = self::$autoload;
        $rootPackage->setAutoload($autoloadDefinition);
    }

    /**
     * Here we generate a relatively efficient file directly loading all
     * the php files we want/found. glob() could be replaced with a better
     * performing alternative or a recursive one.
     */
    private static function writeStaticAutoloader(): void
    {
        file_put_contents(
            self::$autoload,
            "<?php " .
            implode(" ", array_map(static function ($file) {
                    return 'include_once("' . self::$root . '/' . $file . '");';
                }, self::$files)
            ));
    }

}
