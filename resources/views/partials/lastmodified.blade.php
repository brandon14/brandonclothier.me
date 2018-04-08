{{--
    This view will have the $lastModified variable injected into it from the
    @link{App\ViewComposers\LastModifiedComposer} that is registered for this view.
--}}
Website last updated {{ $lastModified->format('F jS, Y \a\t h:i:s A T') }}
