<?php

namespace Messerli90\FirstPromoter;

use Exception;

class Lead extends FirstPromoter
{

    /**
     * Creates a new lead
     *
     * @param       $email
     * @param array $options
     *
     * @return object
     * @throws \Exception
     */
    public static function create($email, array $options = [])
    {
        if (! array_key_exists('ref_id', $options) && ! array_key_exists('promotion_id', $options)) {
            throw new Exception('Referral ID or Promotion ID are required.');
        }

        $options = array_merge([
            'email' => $email,
        ], $options);

        return self::request('POST', 'leads/create', $options);
    }

    /**
     * Identifies an existing lead
     *
     * @param array $options
     *
     * @return object
     * @throws \Exception
     *
     */
    public static function show(array $options = [])
    {
        if (! array_key_exists('id', $options) && ! array_key_exists('uid', $options)
            && ! array_key_exists('email', $options)) {
            throw new Exception('ID, UID, or Email are required.');
        }

        return self::request('GET', 'leads/show', $options);
    }

    /**
     * Updates an existing lead
     *
     * @param array $options
     *
     * @return object
     * @throws \Exception
     */
    public static function update(array $options = [])
    {
        if (! array_key_exists('id', $options) && ! array_key_exists('uid', $options)
            && ! array_key_exists('email', $options)) {
            throw new Exception('ID, UID, or Email are required.');
        }

        return self::request('PUT', 'leads/update', $options);
    }

    /**
     * Deletes a lead
     *
     * @param array $options
     *
     * @return object
     * @throws \Exception
     */
    public static function delete(array $options = [])
    {
        if (! array_key_exists('id', $options) && ! array_key_exists('uid', $options)
            && ! array_key_exists('email', $options)) {
            throw new Exception('ID, UID, or Email are required.');
        }

        return self::request('DELETE', 'leads/delete', $options);
    }
}