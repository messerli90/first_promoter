<?php

namespace Messerli90\FirstPromoter;

use Exception;

class Reward extends FirstPromoter
{
    const ALLOWED_TYPES = ['cash', 'point', 'credits', 'free_months', 'discount_per', 'discount_mon'];

    const ALLOWED_STATUS = ['approved', 'pending', 'denied'];

    /**
     * Create a new reward
     *
     * @param       $type
     * @param       $amount
     * @param array $options
     *
     * @return object
     * @throws \Exception
     *
     */
    public static function create($type, $amount, array $options = [])
    {
        if (empty($type) || empty($amount)) {
            throw new Exception('Reward type and amount are required.');
        }

        if (! in_array($type, self::ALLOWED_TYPES)) {
            throw new Exception('Reward type not allowed.');
        }

        if (! empty($data['status']) && ! in_array($data['status'], self::ALLOWED_STATUS)) {
            throw new Exception('Given status not allowed. (use: approved, pending, denied)');
        }

        $options = array_merge([
            'type' => $type,
            'amount' => $amount
        ], $options);

        return self::request('POST', 'rewards/create', $options);
    }
}