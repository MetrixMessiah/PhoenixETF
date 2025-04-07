<?php

namespace App\Services;

use App\Models\Broker;
use Carbon\Carbon;

class BrokerLicenseService
{
    /**
     * Verify a broker's license number.
     *
     * @param  string  $licenseNumber
     * @return bool
     */
    public function verify($licenseNumber)
    {
        // In a real application, you would:
        // 1. Validate the license format
        // 2. Check against a regulatory database
        // 3. Verify expiration dates
        // 4. Check for suspensions or revocations

        $broker = Broker::where('license_number', $licenseNumber)
            ->where('license_expiry', '>', Carbon::now())
            ->where('is_active', true)
            ->first();

        return $broker !== null;
    }

    /**
     * Check if a license is about to expire.
     *
     * @param  string  $licenseNumber
     * @return bool
     */
    public function isExpiringSoon($licenseNumber)
    {
        $broker = Broker::where('license_number', $licenseNumber)->first();

        if (!$broker) {
            return false;
        }

        $expiryDate = Carbon::parse($broker->license_expiry);
        $monthsUntilExpiry = Carbon::now()->diffInMonths($expiryDate);

        return $monthsUntilExpiry <= 3;
    }

    /**
     * Get the expiration date for a license.
     *
     * @param  string  $licenseNumber
     * @return \Carbon\Carbon|null
     */
    public function getExpirationDate($licenseNumber)
    {
        $broker = Broker::where('license_number', $licenseNumber)->first();

        return $broker ? Carbon::parse($broker->license_expiry) : null;
    }

    /**
     * Validate license number format.
     *
     * @param  string  $licenseNumber
     * @return bool
     */
    public function validateFormat($licenseNumber)
    {
        // Example format: XX-999999-YY where:
        // XX is a 2-letter state code
        // 999999 is a 6-digit number
        // YY is a 2-digit year
        return preg_match('/^[A-Z]{2}-\d{6}-\d{2}$/', $licenseNumber) === 1;
    }
} 