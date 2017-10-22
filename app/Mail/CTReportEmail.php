<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class CTReportEmail extends Mailable
{
    use Queueable;

    /**
     * CT report object.
     *
     * @var  array
     */
    protected $report;

    /**
     * Create a new message instance.
     *
     * @param  array  $report
     */
    public function __construct(array $report)
    {
        $this->report = $report;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.ct-report')->with([
            'report' => $this->report,
        ]);
    }
}
