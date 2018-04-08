<?php

namespace Helpers;

use Exception;
use Illuminate\Support\Str;

if (! function_exists('\Helpers\manifest_asset')) {
    /**
     * Will return a URL for a given versioned asset. Looks for the entry in
     * the mix-manifest.json. Similar to Laravel's mix() function but uses
     * a configurable base URL and and allows the manifest to be elsewhere.
     *
     * @param string $path
     * @param string $baseUrl
     *
     * @return void
     */
    function manifest_asset($path, $baseUrl = '')
    {
        static $manifests = [];

        $manifestDirectory = app('config')->get('app.webpack_asset_dir');

        // Default to the webpack asset URL config value.
        if (! $baseUrl) {
            $baseUrl = app('config')->get('app.webpack_asset_url');
        }

        // The paths in the manifest are not absolute paths, so we need to strip
        // the leading slash if it is present.
        if (Str::startsWith($path, '/')) {
            $path = substr($path, 1);
        }

        $manifestPath = base_path($manifestDirectory.DIRECTORY_SEPARATOR.'mix-manifest.json');

        if (! isset($manifests[$manifestPath])) {
            if (! file_exists($manifestPath)) {
                throw new Exception('The webpack manifest does not exist.');
            }

            $manifests[$manifestPath] = json_decode(file_get_contents($manifestPath), true);
        }

        $manifest = $manifests[$manifestPath];

        if (! isset($manifest[$path])) {
            report(new Exception("Unable to locate manifest file: {$path}."));

            if (! app('config')->get('app.debug')) {
                return $path;
            }
        }

        return app('url')->asset($baseUrl.'/'.$manifest[$path]);
    }
}

if (! function_exists('\Helpers\cdn_asset')) {
    /**
     * Convenience function to generate a CDN URL using the configured image_asset_url
     * config value.
     *
     * @param string $path
     *
     * @return void
     */
    function cdn_asset($path)
    {
        $cdnDirectory = app('config')->get('app.cdn_asset_url');

        if (Str::startsWith($path, '/')) {
            $path = substr($path, 1);
        }

        return app('url')->asset($cdnDirectory.'/'.$path);
    }
}

if (! function_exists('\Helpers\image_asset')) {
    /**
     * Convenience function to generate an image URL using the configured cdn_asset_url
     * config value.
     *
     * @param string $path
     *
     * @return void
     */
    function image_asset($path)
    {
        $imageDirectory = app('config')->get('app.image_asset_url');

        if (Str::startsWith($path, '/')) {
            $path = substr($path, 1);
        }

        return app('url')->asset($imageDirectory.'/'.$path);
    }
}
