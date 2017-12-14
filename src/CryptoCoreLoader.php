<?php
/**
 * Copyright (C) 2017 David O'Riva. MIT License.
 * Original at: https://github.com/starekrow/lockbox
 */

namespace starekrow\Lockbox;
use Exception;

/**
 * CryptoCoreLoader - A driver-loading driver
 *
 * This is the default crypto driver. It tries to auto-select a working core 
 * and re-issue the function call.
 *
 * @package starekrow\Lockbox
 */
class CryptoCoreLoader 
    implements CryptoCore
{
    /**
     * @param $alg
     * @param $data
     *
     * @return mixed
     */
    public function hash($alg, $data )
    {
        Crypto::init();
        return Crypto::hash( $alg, $data );
    }

    /**
     * @param $alg
     * @param $key
     * @param $data
     *
     * @return mixed
     */
    public function hmac($alg, $key, $data )
    {
        Crypto::init();
        return Crypto::hmac( $alg, $key, $data );
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
    public function hkdf($alg, $ikm, $len, $salt = "", $info = "" )
    {
        Crypto::init();
        return Crypto::hkdf( $alg, $ikm, $len, $salt, $info );
    }

    /**
     * @param $alg
     * @param $key
     * @param $iv
     * @param $data
     *
     * @return mixed
     */
    public function encrypt($alg, $key, $iv, $data )
    {
        Crypto::init();
        return Crypto::encrypt( $alg, $key, $iv, $data );
    }

    /**
     * @param $alg
     * @param $key
     * @param $iv
     * @param $data
     *
     * @return mixed
     */
    public function decrypt($alg, $key, $iv, $data )
    {
        Crypto::init();
        return Crypto::decrypt( $alg, $key, $iv, $data );
    }

    /**
     * @param $h1
     * @param $h2
     *
     * @return mixed
     */
    public function hashdiff($h1, $h2 )
    {
        Crypto::init();
        return Crypto::hashdiff( $h1, $h2 );
    }

    /**
     * @param $count
     *
     * @return mixed
     */
    public function random($count )
    {
        Crypto::init();
        return Crypto::random( $count );
    }

    /**
     * @param $alg
     *
     * @return mixed
     */
    public function ivlen($alg )
    {
        Crypto::init();
        return Crypto::ivlen( $alg );
    }

    /**
     * @param $alg
     *
     * @return mixed
     */
    public function keylen($alg )
    {
        Crypto::init();
        return Crypto::keylen( $alg );
    }

    /**
     * @param $alg
     *
     * @return mixed
     */
    public function hashlen($alg )
    {
        Crypto::init();
        return Crypto::hashlen( $alg );
    }

    /**
     * @return mixed
     */
    public function algolist()
    {
        Crypto::init();
        return Crypto::algolist();
    }
}
