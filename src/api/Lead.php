<?php

namespace Messerli90\FirstPromoter\Api;

use Messerli90\FirstPromoter\FirstPromoter;

class Lead extends FirstPromoter
{

    public function create($data = [])
    {
        if (empty($data['email']) || (empty($data['ref_id']) && empty($data['promotion_id']))) {
            return false;
        }

        $uri = 'leads/create';
        $body = [
            'email'                     => $data['email'],
            'promotion_id'              => optional($data['promotion_id']),
            'ref_id'                    => optional($data['ref_id']),
            'uid'                       => optional($data['uid']),
            'first_name'                => optional($data['first_name']),
            'last_name'                 => optional($data['last_name']),
            'state'                     => optional($data['state']),
            'customer_since'            => optional($data['customer_since']),
            'plan_name'                 => optional($data['plan_name'])
        ];

        return $this->request('POST', $uri, $body);
    }

    public function show($id = null, $uid = null, $email = null)
    {
        if (empty($id) && empty($uid) && empty($email)) {
            return false;
        }

        $uri = 'leads/show';
        $body = [
            'id' => $id,
            'uid' => $uid,
            'email' => $email,
        ];

        return $this->request('GET', $uri, $body);
    }
}