<?php

namespace PragmaRX\Google2FALaravel\Support;

trait Auth
{
    /**
     * The auth instance.
     *
     * @var
     */
    protected $auth;

    /**
     * Get or make an auth instance.
     *
     * @return \Illuminate\Foundation\Application|mixed
     */
    protected function getAuth()
    {
        if (is_null($this->auth)) {
            $this->auth = app($this->config('auth'));
        }

        //check config if guard is specified
        if (is_null($this->config('user_guard'))){
            return $this->auth;
        } else {
            return $this->auth->guard($this->config('user_guard'));
        }
    }

    /**
     * Get the current user.
     *
     * @return mixed
     */
    protected function getUser()
    {
        return $this->getAuth()->user();
    }

    abstract public function config($string, $children = []);
}
