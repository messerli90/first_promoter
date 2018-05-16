<?php

namespace Messerli90\FirstPromoter\Api;

use Messerli90\FirstPromoter\FirstPromoter;

class Tracking extends FirstPromoter
{
    /**
     * With this call you can track the referral signs-ups server-side.
     * This is not for tracking the actual sales and commissions.
     *
     * Sign-ups are tracked as leads in FirstPromoter so when a person
     * referred by the promoter/affiliate signs up, a new lead should be
     * added inside FirstPromoter (you can see them inside the "Leads" section).
     *
     * The recommended way to do this is to grab the _fprom_track cookie value
     * (which keeps the tracking id and referral identification) on your server
     * and send it along with the sign-up data through the tid parameter.
     *
     * @param       $wid
     * @param       $email
     * @param array $data
     *
     * @return bool|object
     */
    public function trackSignUp($wid, $email, $data = [])
    {
        if ((empty($wid) || empty($email)) || (empty($data['tid']) && empty($data['ref_id']))) {
            return false;
        }

        $uri = 'track/signup';
        $body = [
            'wid'           => $wid,
            'email'         => $email,
            'uid'           => optional($data['uid']),
            'first_name'    => optional($data['first_name']),
            'last_name'     => optional($data['last_name']),
            'tid'           => optional($data['tid']),
            'ref_id'        => optional($data['ref_id']),
            'ip'            => optional($data['ip']),
        ];

        return $this->request('POST', $uri, $body);
    }

    /**
     * Track sales and generate commissions
     *
     * @param       $email
     * @param       $event_id
     * @param       $amount "Amount in cents"
     * @param array $data
     *
     * @return bool|object
     */
    public function trackSalesAndCommissions($email, $event_id, $amount, $data = [])
    {
        if (empty($event_id) || empty($email) || empty($amount))
            return false;

        $uri = 'track/sale';
        $body = [
            'email'         => $email,
            'event_id'      => $event_id,
            'amount'        => $amount,
            'uid'           => optional($data['uid']),
            'first_name'    => optional($data['first_name']),
            'last_name'     => optional($data['last_name']),
            'plan'          => optional($data['plan']),
            'mrr'           => optional($data['mrr']),
            'promo_code'    => optional($data['promo_code']),
        ];

        return $this->request('POST', $uri, $body);
    }

}