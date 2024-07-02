<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita304b641aea4bf2e5946dc08b8bd70c5
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Ghostff\\Session\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ghostff\\Session\\' => 
        array (
            0 => __DIR__ . '/..' . '/ghostff/session/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita304b641aea4bf2e5946dc08b8bd70c5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita304b641aea4bf2e5946dc08b8bd70c5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita304b641aea4bf2e5946dc08b8bd70c5::$classMap;

        }, null, ClassLoader::class);
    }
}