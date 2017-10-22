<?php

namespace App\Http\Controllers;

use App\Mail\CTReportEmail;
use Illuminate\Mail\Mailer;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Log\Writer as Logger;

class CTReportController extends Controller
{
    /**
     * Mailer service.
     *
     * @var \Illuminate\Mail\Mailer
     */
    private $mailer;

    /**
     * Logger service.
     *
     * @var \Illuminate\Log\Writer
     */
    private $logger;

    /**
     * CTReportController constructor.
     *
     * @param \Illuminate\Mail\Mailer $mailer
     * @param \Illuminate\Log\Writer  $logger
     */
    public function __construct(Mailer $mailer, Logger $logger)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    /**
     * Controller function to send a Expect-CT failure report.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendReport(Request $request)
    {
        $ctReportEmail = config('mail.ct_report_email');
        $report = $request->json()->all();

        // Log the Expect-CT failure.
        $this->logger->error('Expect-CT Failure Report: ', $report);

        // Send the report in an email.
        $this->mailer->to($ctReportEmail)->send(
            new CTReportEmail($report)
        );

        return new JsonResponse([
            'message' => 'Except-CT failure reported.',
            'status'  => 200,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}
