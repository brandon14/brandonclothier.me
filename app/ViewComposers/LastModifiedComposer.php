<?php

namespace App\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Contracts\Services\LastModified;

class LastModifiedComposer
{
    /**
     * The last modified service implementation.
     *
     * @var \App\Contracts\Services\LastModified
     */
    protected $lastModified;

    /**
     * Create a last modified composer.
     *
     * @param \App\Contracts\Services\LastModified $lastModified
     *
     * @return void
     */
    public function __construct(LastModified $lastModified)
    {
        // Inject the LastModified service interface into this view composer
        // class.
        $this->lastModified = $lastModified;
    }

    /**
     * Bind data to the view.
     *
     * @param \Illuminate\Contracts\View\View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        // Return the last modified time as the variable $lastModified.
        $view->with('lastModified', $this->lastModified->getLastModifiedTime());
    }
}
