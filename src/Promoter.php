<?php

namespace Messerli90\FirstPromoter;

use Exception;

class Promoter extends FirstPromoter
{
    /**
     * Use this endpoint to create new promoters
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
     * Identify promoters
     *
     * @param null $id
     * @param null $cust_id
     * @param null $ref_id
     * @param null $auth_token
     *
     * @return object
     * @throws \Exception
     */
    public function show($id = null, $cust_id = null, $ref_id = null, $auth_token = null)
    {
        if (empty($id) && empty($cust_id) && empty($ref_id) && empty($auth_token)) {
            throw new Exception('ID, UID, or Email are required.');
        }

        $options = [
            'id' => $id,
            'cust_id' => $cust_id,
            'ref_id' => $ref_id,
            'auth_token' => $auth_token
        ];

        return $this->request('GET', 'promoters/show', $options);
    }


}