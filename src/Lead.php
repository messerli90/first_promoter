<?php

namespace Messerli90\FirstPromoter;

use Exception;

class Lead extends FirstPromoter
{

    /**
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
     * @param null $id
     * @param null $uid
     * @param null $email
     *
     * @return object
     * @throws \Exception
     */
    public function show($id = null, $uid = null, $email = null)
    {
        if (empty($id) && empty($uid) && empty($email)) {
            throw new Exception('ID, UID, or Email are required.');
        }

        $options = [
            'id' => $id,
            'uid' => $uid,
            'email' => $email,
        ];

        return $this->request('GET', 'leads/show', $options);
    }
}