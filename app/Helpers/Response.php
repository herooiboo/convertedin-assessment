<?php

/**
 * Generate a response for success or failure scenarios.
 *
 * @param array $configuration Configuration options:
 *     - 'on_success_variable': Variable indicating success
 *     - 'success_redirect_route': Redirect route on success
 *     - 'success_message': Success message to be flashed
 *     - 'error_redirect_route': Redirect route on failure
 *     - 'error_message': Error message to be flashed
 *
 * @return \Illuminate\Http\RedirectResponse
 */
if (!function_exists('successFailResponse')) {
    function successFailResponse($configuration = [
        'on_success_variable'       => null,
        'success_redirect_route'    => null,
        'success_message'           => null,
        'error_redirect_route'      => null,
        'error_message'             => null,
    ])
    {
        if ($configuration['on_success_variable'] ?? false && $configuration['success_redirect_route'])
            return redirect($configuration['success_redirect_route'])->with('successMessage', $configuration['success_message'] ?? '');
        if ($configuration['error_redirect_route'] ?? false)
            return redirect($configuration['error_redirect_route'])->withErrors($configuration['error_message'] ?? '');
        return redirect()->back()->withErrors($configuration['error_message'] ?? '');
    }
}