<?php

namespace Dump;

use Composer\Script\Event;

class ComposerScripts
{
    private static $root = '.';

    private static $autoload = __DIR__ . '/autoload.php';

    private static $files = [
        'Reflection/functions.php'
    ];

    private static $filesFromComposer = [
        '../../vendor/lstrojny/functional-php'
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
            "<?php \n\n" .
            implode("", array_map(static function ($file) {
                    return 'include_once(__DIR__."/' . self::$root . '/' . $file . '");' . "\n";
                }, self::getFiles())
            ));
    }

    private static function getFiles(): array
    {
        if (empty(self::$filesFromComposer)) {
            return self::$files;
        }

        foreach (self::$filesFromComposer as $composerJson) {
            $composerArray = json_decode(
                file_get_contents(__DIR__ . "/" . self::$root . '/' . $composerJson . "/composer.json"),
                true);
            array_map(fn($file) => self::$files[] = "$composerJson/$file", $composerArray['autoload']['files']);
        }

        return self::$files;
    }

}
