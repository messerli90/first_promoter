<?php

namespace Messerli90\FirstPromoter\Api;

use Messerli90\FirstPromoter\FirstPromoter;

class Reward extends FirstPromoter
{
    const ALLOWED_TYPES = ['cash', 'point', 'credits', 'free_months', 'discount_per', 'discount_mon'];

    const ALLOWED_STATUS = ['approved', 'pending', 'denied'];

    /**
     * @param       $type
     * @param       $amount
     * @param array $data
     *
     * @return bool|object
     */
    public function create($type, $amount, $data = [])
    {
        if (empty($type) || empty($amount)) {
            return false;
        }

        if (! in_array($type, self::ALLOWED_TYPES)) {
            return false;
        }

        if (! empty($data['status']) && ! in_array($data['status'], self::ALLOWED_STATUS)) {
            return false;
        }

        $uri = 'rewards/create';
        $body = [
            'lead_id'       => optional($data['lead_id']),
            'email'         => optional($data['email']),
            'uid'           => optional($data['uid']),
            'promotion_id'  => optional($data['promotion_id']),
            'ref_id'        => optional($data['ref_id']),
            'reward_type'   => $type,
            'amount'        => $amount,
            'status'        => optional($data['status']),
            'skip_email_notification' => optional($data['skip_email_notification']),
        ];

        return $this->request('POST', $uri, $body);
    }
}