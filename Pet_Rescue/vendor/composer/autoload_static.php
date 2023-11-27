<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit86504c62a3633f21a899831b6fdf1a42
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Caiop\\PetRescue\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Caiop\\PetRescue\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit86504c62a3633f21a899831b6fdf1a42::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit86504c62a3633f21a899831b6fdf1a42::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit86504c62a3633f21a899831b6fdf1a42::$classMap;

        }, null, ClassLoader::class);
    }
}
