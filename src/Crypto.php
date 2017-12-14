<?php
/**
 * Copyright (C) 2017 David O'Riva. MIT License.
 * Original at: https://github.com/starekrow/lockbox
 */

namespace starekrow\Lockbox;

/**
 * Crypto - Basic encryption support
 *
 * Provides a static interface to various cryptographic functions. Uses a 
 * driver-based model to simplify adaptation to different platforms.
 * 
 * See also `CryptoCore` et al.
 * 
 * @package starekrow\Lockbox
 */
class Crypto 
{
    protected static $impl;

    /**
     * @param null $provider
     *
     * @return bool
     */
    public static function init($provider = null )
    {
        if (!$provider) {
            // TODO: sodium support
            //if (is_function( "sodium_crypto_secretbox" )) {
            //    $provider = "sodium";
            //} else 
            if (function_exists( "openssl_encrypt" )) {
                $provider = "openssl";
            } else {
                $provider = "builtin";
            }
        }
        $cls = "starekrow\\Lockbox\\CryptoCore" . ucwords( $provider );
        if (!class_exists( $cls )) {
            self::$impl = new CryptoCoreFailed();
            return false;
        }
        try {
            self::$impl = new $cls;
        } catch (\Exception $e) {
            self::$impl = new CryptoCoreFailed();
            return false;
        }
        return true;
    }

    /**
     * @param $alg
     * @param $data
     *
     * @return mixed
     */
    public static function hash($alg, $data )
    {
        return self::$impl->hash( $alg, $data );
    }

    /**
     * @param $alg
     * @param $key
     * @param $data
     *
     * @return mixed
     */
    public static function hmac($alg, $key, $data )
    {
        return self::$impl->hmac( $alg, $key, $data );
    }

    /**
     * @param        $alg
     * @param        $ikm
     * @param        $len
     * @param string $salt
     * @param string $info
     *
     * @return mixed
     */
    public static function hkdf($alg, $ikm, $len, $salt = "", $info = "" )
    {
        return self::$impl->hkdf( $alg, $ikm, $len, $salt, $info );
    }

    /**
     * @param $alg
     * @param $key
     * @param $iv
     * @param $data
     *
     * @return mixed
     */
    public static function encrypt($alg, $key, $iv, $data )
    {
        return self::$impl->encrypt( $alg, $key, $iv, $data );
    }

    /**
     * @param $alg
     * @param $key
     * @param $iv
     * @param $data
     *
     * @return mixed
     */
    public static function decrypt($alg, $key, $iv, $data )
    {
        return self::$impl->decrypt( $alg, $key, $iv, $data );
    }

    /**
     * @param $h1
     * @param $h2
     *
     * @return mixed
     */
    public static function hashdiff($h1, $h2 )
    {
        return self::$impl->hashdiff( $h1, $h2 );
    }

    /**
     * @param $count
     *
     * @return mixed
     */
    public static function random($count )
    {
        return self::$impl->random( $count );
    }

    /**
     * @param $alg
     *
     * @return mixed
     */
    public static function ivlen($alg )
    {
        return self::$impl->ivlen( $alg );
    }

    /**
     * @param $alg
     *
     * @return mixed
     */
    public static function keylen($alg )
    {
        return self::$impl->keylen( $alg );
    }

    /**
     * @param $alg
     *
     * @return mixed
     */
    public static function hashlen($alg )
    {
        return self::$impl->hashlen( $alg );
    }

    /**
     * @return mixed
     */
    public static function algolist()
    {
        return self::$impl->algolist();
    }
}

Crypto::init( "Loader" );
