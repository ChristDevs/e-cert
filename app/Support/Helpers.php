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
    function withInfo($message = 'Request was Successful', $type = 'success', $title = 'Success')
    {
        flash_message($message, $type, $title);

        return redirect()->back();
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
    function redirectWithInfo($url, $message = 'Request Successful', $type = 'success', $title = 'Success')
    {
        flash_message($message, $type, $title);

        return redirect($url);
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
if (!function_exists('isActive')) {
    /**
     * Set the active class to the current opened menu.
     *
     * @param string|array $route
     * @param string       $className
     *
     * @return string
     */
    function isActive($route, $className = 'active')
    {
        $check = function ($route) use ($className) {
            if (request()->path() == $route) {
                return $className;
            }
            if (request()->is($route)) {
                return $className;
            }
        };
        if (is_array($route)) {
            foreach ($route as $value) {
                $test = $check($value);
                if ($test != null) {
                    return $test;
                }
            }

            return;
        }

        return $check($route);
    }//end isActive()
}//end if

if (!function_exists('flash_message')) {
    
    /**
     * Flash a message into the session to be displayed to the user.
     *
     * @param string $message
     * @param string $type
     * @param string $title
     */
    function flash_message(string $message, string $type, string $title)
    {
        request()->session()->flash('messages', ['type' => $type, 'message' => $message, 'title' => $title]);
    }
}
