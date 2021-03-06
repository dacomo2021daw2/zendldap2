<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcc562366f9cfddaef8a0bbd6f3da1c19
{
    public static $files = array (
        '7e9bd612cc444b3eed788ebbe46263a0' => __DIR__ . '/..' . '/laminas/laminas-zendframework-bridge/src/autoload.php',
    );

    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Laminas\\ZendFrameworkBridge\\' => 28,
            'Laminas\\Ldap\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Laminas\\ZendFrameworkBridge\\' => 
        array (
            0 => __DIR__ . '/..' . '/laminas/laminas-zendframework-bridge/src',
        ),
        'Laminas\\Ldap\\' => 
        array (
            0 => __DIR__ . '/..' . '/laminas/laminas-ldap/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcc562366f9cfddaef8a0bbd6f3da1c19::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcc562366f9cfddaef8a0bbd6f3da1c19::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
