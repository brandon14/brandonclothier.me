<?php

namespace App\Contracts\Services;

use Carbon\Carbon;

interface LastModified
{
    /**
     * Function to get the last modified time for the application.
     *
     * @return \Carbon\Carbon
     */
    public function getLastModifiedTime();
}
