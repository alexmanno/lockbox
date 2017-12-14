<?php
/**
 * Copyright (C) 2017 David O'Riva. MIT License.
 * Original at: https://github.com/starekrow/lockbox
 */

namespace starekrow\Lockbox;

/**
 * CryptoCore - An interface for various cryptographic functions
 *
 * @package starekrow\Lockbox
 */
interface CryptoCore
{
    /**
     * @param $alg
     * @param $data
     *
     * @return mixed
     */
    function hash($alg, $data );

    /**
     * @param $alg
     * @param $key
     * @param $data
     *
     * @return mixed
     */
    function hmac($alg, $key, $data );

    /**
     * @param        $alg
     * @param        $ikm
     * @param        $len
     * @param string $salt
     * @param string $info
     *
     * @return mixed
     */
    function hkdf($alg, $ikm, $len, $salt = "", $info = "" );

    /**
     * @param $alg
     * @param $key
     * @param $iv
     * @param $data
     *
     * @return mixed
     */
    function encrypt($alg, $key, $iv, $data );

    /**
     * @param $alg
     * @param $key
     * @param $iv
     * @param $data
     *
     * @return mixed
     */
    function decrypt($alg, $key, $iv, $data );

    /**
     * @param $h1
     * @param $h2
     *
     * @return mixed
     */
    function hashdiff($h1, $h2 );

    /**
     * @param $count
     *
     * @return mixed
     */
    function random($count );

    /**
     * @param $alg
     *
     * @return mixed
     */
    function ivlen($alg );

    /**
     * @param $alg
     *
     * @return mixed
     */
    function keylen($alg );

    /**
     * @param $alg
     *
     * @return mixed
     */
    function hashlen($alg );
    function algolist();
}
