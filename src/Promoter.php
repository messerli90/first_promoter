<?php

namespace Messerli90\FirstPromoter;

use Exception;

class Promoter extends FirstPromoter
{
    /**
     * Creates a new promoter
     *
     * @param       $email
     * @param array $options
     *
     * @return object
     *
     */
    public static function create($email, array $options = [])
    {
        $options = array_merge([
            'email' => $email,
        ], $options);

        return self::request('POST', 'promoters/create', $options);
    }

    /**
     * Identifies promoters
     *
     * @param array $options
     *
     * @return object
     * @throws \Exception
     *
     */
    public static function show(array $options)
    {
        if (! array_key_exists('id', $options) && ! array_key_exists('cust_id', $options)
            && ! array_key_exists('ref_id', $options) && ! array_key_exists('auth_token', $options)) {
            throw new Exception('ID, Customer ID, Referral ID, or Auth Token are required.');
        }

        return self::request('GET', 'promoters/show', $options);
    }

    /**
     * Modifies existing promoter
     *
     * @param array $options
     *
     * @return object
     * @throws \Exception
     *
     */
    public static function update(array $options)
    {
        if (! array_key_exists('id', $options) && ! array_key_exists('cust_id', $options)
            && ! array_key_exists('ref_id', $options) && ! array_key_exists('auth_token', $options)) {
            throw new Exception('ID, Customer ID, Referral ID, or Auth Token are required.');
        }

        return self::request('PUT', 'promoters/update', $options);
    }


    /**
     * Deletes a promoter
     *
     * @param array $options
     *
     * @return object
     * @throws \Exception
     *
     */
    public static function delete(array $options)
    {
        if (! array_key_exists('id', $options) && ! array_key_exists('cust_id', $options)
            && ! array_key_exists('ref_id', $options) && ! array_key_exists('auth_token', $options)) {
            throw new Exception('ID, Customer ID, Referral ID, or Auth Token are required.');
        }

        return self::request('DELETE', 'promoters/delete', $options);
    }

    /**
     * Resets authentication token(auth_token) which is used to automatically sign in your promoters
     *
     * @param null $id
     * @param null $cust_id
     * @param null $auth_token
     *
     * @return object
     * @throws \Exception
     */
    public static function refreshTracker($id = null, $cust_id = null, $auth_token = null)
    {
        if (empty($id) && empty($cust_id) && empty($ref_id) && empty($auth_token)) {
            throw new Exception('ID, Customer ID, or Auth Token are required.');
        }

        $options = [
            'id' => $id,
            'cust_id' => $cust_id,
            'auth_token' => $auth_token
        ];

        return self::request('PUT', 'promoters/refresh_token', $options);
    }
}