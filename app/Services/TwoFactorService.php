<?php

namespace App\Services;

use PragmaRX\Google2FA\Google2FA;

class TwoFactorService
{
    protected $google2fa;

    /**
     * Create a new service instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->google2fa = new Google2FA();
    }

    /**
     * Verify the provided 2FA code.
     *
     * @param  string  $code
     * @return bool
     */
    public function verify($code)
    {
        // In a real application, you would:
        // 1. Retrieve the user's secret key from the database
        // 2. Use Google2FA to verify the code against the secret
        // 3. Implement time window and backup codes
        
        // For demo purposes, we'll accept any 6-digit code
        return strlen($code) === 6 && is_numeric($code);
    }

    /**
     * Generate a new secret key for a user.
     *
     * @return string
     */
    public function generateSecretKey()
    {
        return $this->google2fa->generateSecretKey();
    }

    /**
     * Get the QR code URL for the user's secret key.
     *
     * @param  string  $email
     * @param  string  $secretKey
     * @return string
     */
    public function getQRCodeUrl($email, $secretKey)
    {
        return $this->google2fa->getQRCodeUrl(
            config('app.name'),
            $email,
            $secretKey
        );
    }
} 