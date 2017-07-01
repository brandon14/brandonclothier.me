## brandonclothier.me Changelog
### 1.2.2 June 30th, 2017
- Hotfix to fix the Travis-CI build.

### 1.2.1 June 30th, 2017
- Hotfix for the Google reCAPTCHA JavaScript object not being available inside the closure.

### 1.2.0 June 26th, 2017
- Add reCAPTCHA to contact form
- Add contact route validation and custom FormRequest.
- Fix Google+ button alignment when footer is collapsed.
- Refactor exception handler to better handle TokenMismatchExceptions and return consistent responses for validation errors.
- Update npm and composer dependencies.
- Update to laravel-mix 1.0.6
- Use spatie's laravel sitemap generator.
- Simplify and refactor webpack build script.
- Change the public path for the console kernel in the kernel bootstrap function.
- Add a Google+ and Twitter follow button to the footer.
- Clean up the css a little.

### 1.1.2 June 17th, 2017
- Clean up the resume style to be more consistent.
- Prettify the resume style and layout on mobile views.

### 1.1.1 June 17th, 2017
- Update to Laravel 5.4.27.
- Update composer dependencies.
- Update npm dependencies.
- Use local copies of Google fonts so we can control the cache headers.
- Refactor JavaScript functions to be ES6 arrow functions.
- Bundle out jquery.easing, bootstrap-sass and bootstrap-material-design JavaScript in the Webpack bundle.
- LastModified service provider will now return a Carbon instance.
- Make blade templates handle dev vs production environments when creating URL's.
- Only include the social media widgets and JavaScript in production.
- Fix for laravel/framework#19405
- Add sameAs social media links to person schema.
- Add website schema.

### 1.1.0 May 21st, 2017
- Move contact route out of api group.
- Enforce CSRF token for contact route.
- Add some sanity to all JSON responses. Use a unified JSON response format.
- Ensure that any response when the request expects JSON is returned as JSON.
- Use only import statements in app.js
- Update Laravel skeleton to 5.4.23
- Update Laravel framework to 5.4.23
- Split Laravel logs into a separate log for each log level, and a unified daily log.
- Add CodeCov support to TravisCI build.
- Enable FrameGuard middleware.
- Add Bing site validation.
- Add Pinterest site validation.
- Add Google+ button and Pinterest save button in footer.
- Fix some asset URLs causing 302 too many redirects.
- Add schema.org meta.

### 1.0.1 May 7th, 2017
- Cleanup README and the pull request template.
- Fix extra } in the footer blade template.

### 1.0.0 May 6th, 2017
- Initial application release.
- Application was ported over to a Laravel 5.4 application.
