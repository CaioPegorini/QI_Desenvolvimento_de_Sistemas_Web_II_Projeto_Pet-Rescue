<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit86504c62a3633f21a899831b6fdf1a42
{
    public static $files = array (
        '8c3eed066e5289a2a696b647c6255d32' => __DIR__ . '/../..' . '/config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'Q' => 
        array (
            'QI\\PetRescue\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'QI\\PetRescue\\' => 
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