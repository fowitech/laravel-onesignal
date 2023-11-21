<?php

if (!function_exists('onesignal')) {
    /**
     * Onesignal helper function
     * @return \Fowitech\OneSignal\OneSignal
     */
    function onesignal()
    {
        return app(\Fowitech\OneSignal\OneSignal::class);
    }
}
