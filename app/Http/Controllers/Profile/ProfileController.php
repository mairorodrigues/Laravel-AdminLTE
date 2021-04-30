<?php 

namespace App\Http\Controllers\Profile; 

use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; 
use App\Models\Role;
use App\Models\User;
use App\Http\Requests\Profile\UpdateProfileRequest; 
use App\Http\Requests\Profile\UpdatePasswordProfileRequest; 
use App\Http\Requests\Profile\UpdateAvatarProfileRequest; 

//use App\Models\Perfil\Perfil; 

class ProfileController extends Controller 
{ 
	public function __construct() 
	{ 
		$this->middleware("auth");
	} 

	public function index() 
	{ 
		$user = Auth::user();

		$roles = Role::all();

		$roles_ids = Role::rolesUser($user);

		return view('profile.index',compact('user', 'roles', 'roles_ids'));
	}

	public function updateProfile(UpdateProfileRequest $request,$id)
    {
    	$user = User::find($id);

        if(!$user){
        	$this->flashMessage('warning', 'Usuário não encontrado!', 'danger');            
            return redirect()->route('user');
        }

        if($user != Auth::user()){
    		$this->flashMessage('warning', 'Erro ao atualizar perfil!', 'danger');            
            return redirect()->route('profile');
    	}

        $user->update($request->all());        

        $this->flashMessage('check', 'Perfil atualizado com Sucesso!', 'success');

        return redirect()->route('profile');
    }

	public function updatePassword(UpdatePasswordProfileRequest $request,$id)
    {
    	$user = User::find($id);    	

        if(!$user){
        	$this->flashMessage('warning', 'Usuário não encontrado!', 'danger');            
            return redirect()->route('user');
        }

        if($user != Auth::user()){
    		$this->flashMessage('warning', 'Erro ao atualizar senha!', 'danger');            
            return redirect()->route('profile');
    	}

        $request->merge(['password' => bcrypt($request->get('password'))]);

        $user->update($request->all());

        $this->flashMessage('check', 'Senha atualizada com sucesso!', 'success');

        return redirect()->route('profile');
    }

    public function updateAvatar(UpdateAvatarProfileRequest $request,$id)
    {
    	$user = User::find($id);    	

        if(!$user){
        	$this->flashMessage('warning', 'Usuário não encontrado!', 'danger');            
            return redirect()->route('user');
        }

        if($user != Auth::user()){
    		$this->flashMessage('warning', 'Erro ao atualizar avatar!', 'danger');            
            return redirect()->route('profile');
    	}

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg,ico|max:2048',
        ]);

        if($request->file('avatar')){
    		$file = $request->file('avatar');
    		$ext  = $file->guessClientExtension();
            $path = $file->move("profiles/$id", "avatar.{$ext}");
    		User::where('id', $id)->update(['avatar' => "profiles/$id/avatar.{$ext}"]);
    	}

        $this->flashMessage('check', 'Avatar atualizado com sucesso!', 'success');

        return redirect()->route('profile');
    }
}