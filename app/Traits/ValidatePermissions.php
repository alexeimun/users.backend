<?php

namespace App\Traits;

trait ValidatePermissions
{


    public function permissions(){

        return $this->hasMany('App\Models\Permission');

    }

	/**
	 * validate array permissions with entity permissions
	 *
	 * @return boolean
	 */
    public function validatePermissions($permissions = [])
    {

    	$entityPermissions = array_pluck($this->permissions->toArray(), 'name');

        foreach ($permissions as $permission) {
        	if(!in_array($permission, $entityPermissions)){
        		return false;
        	}
        }

        return true;
    }
}