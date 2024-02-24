<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd7f77dcfce466cd2dab76969985d0323
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd7f77dcfce466cd2dab76969985d0323::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd7f77dcfce466cd2dab76969985d0323::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd7f77dcfce466cd2dab76969985d0323::$classMap;

        }, null, ClassLoader::class);
    }
}