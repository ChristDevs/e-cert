<?php

if (!function_exists('witInfo')) {
    /**
     * Redirect back to the prevuos url with a response message.
     *
     * @param string $message
     * @param string $type
     *
     * @return \Illuminate\Http\Response
     */
    function withInfo($message = 'Request Successful', $type = 'success')
    {
        return redirect()->back()->withErrors([$type => $type, 'message' => $message], 'noty');
    }//end withInfo()
}

if (!function_exists('redirectWitInfo')) {
    /**
     * Redirect back to a given url with a response message.
     * The message s stored in an error bag called noty.
     *
     * @param string $message Message to be shown to the user
     * @param string $type    Type of message {error, warning, info, success}
     *
     * @return \Illuminate\Http\Response
     */
    function redirectWithInfo($url, $message = 'Request Successful', $type = 'success')
    {
        return redirect($url)->withErrors([$type => $type, 'message' => $message], 'noty');
    }//end redirectWithInfo()
}

if (!function_exists('error')) {
    /**
     * Determine if a field is in the MessageBag object.
     *
     * @param \Illuminate\Support\MessageBag $errors Error bag
     * @param string                         $key    The field to check
     *
     * @return string Error CSS class or emty
     */
    function error($errors, $key = '')
    {
        return $errors->has($key) ? 'has-error' : '';
    }//end error()
}
if (!function_exists('error_msg')) {
    /**
     * Get the first error message for a field from the MessageBag object.
     *
     * @param \Illuminate\Support\MessageBag $errors Error bag
     * @param string                         $key    The field to check
     *
     * @return string Error message or the given key or emty
     */
    function error_msg($errors, $key = '')
    {
        return $errors->first($key, '<span class="help-block">:message</span>');
    }//end error_msg()
}
