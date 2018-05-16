<?php

namespace Messerli90\FirstPromoter\Api;

use Messerli90\FirstPromoter\FirstPromoter;

class Promoter extends FirstPromoter
{
    /**
     * Use this endpoint to create new promoters
     *
     * @param       $email
     * @param array $data
     *
     * @return object
     */
    public function create($email, $data = [])
    {
        $uri = 'promoters/create';
        $body = [
            'email'                     => $email,
            'first_name'                => optional($data['first_name']),
            'last_name'                 => optional($data['last_name']),
            'cust_id'                   => optional($data['cust_id']),
            'ref_id'                    => optional($data['ref_id']),
            'promo_code'                => optional($data['promo_code']),
            'campaign_id'               => optional($data['campaign_id']),
            'temp_password'             => optional($data['temp_password']),
            'landing_url'               => optional($data['landing_url']),
            'url_tracking'              => optional($data['url_tracking']),
            'website'                   => optional($data['website']),
            'paypal_email'              => optional($data['paypal_email']),
            'avatar_url'                => optional($data['avatar_url']),
            'description'               => optional($data['description']),
            'skip_email_notification'   => optional($data['skip_email_notification']),
        ];

        return $this->request('POST', $uri, $body);
    }

    /**
     * Identify promoters
     *
     * @param null $id
     * @param null $cust_id
     * @param null $ref_id
     * @param null $auth_token
     *
     * @return bool|object
     */
    public function show($id = null, $cust_id = null, $ref_id = null, $auth_token = null)
    {
        if (empty($id) && empty($cust_id) && empty($ref_id) && empty($auth_token)) {
            return false;
        }

        $uri = 'promoters/show';
        $body = [
            'id' => $id,
            'cust_id' => $cust_id,
            'ref_id' => $ref_id,
            'auth_token' => $auth_token
        ];

        return $this->request('GET', $uri, $body);
    }


}