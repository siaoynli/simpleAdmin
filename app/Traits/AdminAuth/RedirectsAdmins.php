<?php

namespace App\Traits\AdminAuth;

/**
 * Class RedirectsAdmins
 *
 * @package \Traits\Admin
 */
trait RedirectsAdmins
{

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }
        return property_exists($this, 'redirectTo') ? $this->redirectTo : route('admin.index');
    }
}
