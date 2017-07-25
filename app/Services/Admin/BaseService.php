<?

namespace App\Services\Admin;

use Auth;

class BaseService
{
	public  function  getAdmin(){
	    return Auth::guard('admin')->user();
    }

    public  function  getAdminName(){
        return $this->getAdmin()->name;
    }

    public  function  getAdminId(){
        return $this->getAdmin()->id;
    }

    public  function  getClientIp(){
        return request()->getClientIp();
    }

}