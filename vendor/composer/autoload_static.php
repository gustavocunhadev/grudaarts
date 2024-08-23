<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6ed5ee9216b38c9ede9289bc37102f26
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Grudaarts\\Mvc\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Grudaarts\\Mvc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6ed5ee9216b38c9ede9289bc37102f26::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6ed5ee9216b38c9ede9289bc37102f26::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
