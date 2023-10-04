<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;
use App\Http\Requests\ConfigRequest;
use App\Models\PermissionGroup; 
use App\Models\Permission; 
use App\Models\Role; 
use Gate;
use App;

class ConfigController extends Controller
{    
    public function index()
    {

        $config = Config::find(1);

        $this->authorize('root-dev', $config);

		$roles = Role::all(); 

		$permission_groups = PermissionGroup::paginate(15);

		$permissions = Permission::paginate(15);
           	
    	return view('config.index',compact('config', 'permission_groups', 'permissions', 'roles'));
    }

    public function update(ConfigRequest $request, $id)
    {   
        $this->authorize('root-dev', Config::class);

    	Config::find($id)->update($request->all());		

    	if($request->file('caminho_img_login')){
    		$file = $request->file('caminho_img_login');
    		$ext  = $file->guessClientExtension();			
            $path = $file->move("img/config", "logo.{$ext}");
    		Config::where('id', 1)->update(['caminho_img_login' => "img/config/logo.{$ext}"]);
    	}

    	if($request->file('favicon')){
    		$file = $request->file('favicon');
    		$ext  = $file->guessClientExtension();			
            $path = $file->move("img/config", "favicon.{$ext}");
    		Config::where('id', 1)->update(['favicon' => "img/config/favicon.{$ext}"]);
    	}

        $this->flashMessage('check', 'Application settings updated successfully!', 'success');

    	return redirect()->route('config');
    }

    public function storePermissionGroup(Request $request)
    {
        $this->authorize('root-dev', Config::class);

        $permission_group = PermissionGroup::create($request->all());

        $this->flashMessage('check', 'Permission Group successfully added!', 'success');

        return redirect()->route('config');
    }

    public function updatePermissionGroup(Request $request, $id)
    {   
        $this->authorize('root-dev', Config::class);

    	PermissionGroup::find($id)->update($request->all());    	

        $this->flashMessage('check', 'Permission Group updated successfully!', 'success');

    	return redirect()->route('config');
    }

    public function storePermission(Request $request)
    {
        $this->authorize('root-dev', Config::class);

        $permission = Permission::create($request->all());

        $this->flashMessage('check', 'Permission successfully added!', 'success');

        return redirect()->route('config');
    }

    public function updatePermission(Request $request, $id)
    {   
        $this->authorize('root-dev', Config::class);

    	Permission::find($id)->update($request->all());    	

        $this->flashMessage('check', 'Permission updated successfully!', 'success');

    	return redirect()->route('config');
    }
}
