<?php
/**
 * Copyright (C) 2017 David O'Riva. MIT License.
 * Original at: https://github.com/starekrow/lockbox
 */

namespace starekrow\Lockbox;
use Exception;

/**
 * CryptoCoreOpenssl - Cryptographic driver using OpenSSL
 *
 * Builds on `CryptoCoreBuiltin` for hashing.
 * 
 * @package starekrow\Lockbox
 */
class CryptoCoreOpenssl
    extends CryptoCoreBuiltin
{
    /**
     * @param $alg
     * @param $key
     * @param $iv
     * @param $data
     *
     * @return mixed|string|void
     */
    public function encrypt($alg, $key, $iv, $data )
    {
        $options = OPENSSL_RAW_DATA;
        return openssl_encrypt($data, $alg, $key, $options, $iv);
    }

    /**
     * @param $alg
     * @param $key
     * @param $iv
     * @param $data
     *
     * @return mixed|string|void
     */
    public function decrypt($alg, $key, $iv, $data )
    {
        $options = OPENSSL_RAW_DATA;
        return openssl_decrypt($data, $alg, $key, $options, $iv);
    }

    /**
     * @param $count
     *
     * @return string
     */
    public function random($count )
    {
        return openssl_random_pseudo_bytes( $count );
    }

    /**
     * @param $alg
     *
     * @return int|mixed|void
     */
    public function ivlen($alg )
    {
        return openssl_cipher_iv_length( $alg );
    }

    /**
     * @param $alg
     *
     * @return mixed|void
     * @throws Exception
     */
    public function keylen($alg )
    {
        throw new Exception( "Unknown algorithm" );
    }

    /**
     * @return array
     */
    public function algolist()
    {
        $got = parent::algolist();
        $got[ 'cipher' ] = openssl_get_cipher_methods();
        return $got;
    }
}
