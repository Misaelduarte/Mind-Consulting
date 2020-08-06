<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $loggeId = intval( Auth::id() );

        $user = User::find($loggeId);

        if($user) {
            return view('admin.profile.index', [
                'user' => $user
            ]);
        }
        return redirect()->route('admin');
    }


public function save(Request $request)
{
    $loggeId = intval( Auth::id() );
    $user = User::find($loggeId);

    if($user) {
        $data = $request->only([
            'name',
            'email',
            'password'
        ]);
        $validator = Validator::make([
            'name' => $data['name'],
            'email' => $data['email']
        ], [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100']
        ]);

        // Alteração do nome
        $user->name = $data['name'];

        // Verificando se o email foi alterado
        if($user->email != $data['email']) {
            // Verificando se o novo email já existe
            $hasEmail = User::where('email', $data['email'])->get();
                // Se não existir email, sera alterado
            if(count($hasEmail) === 0) {
                $user->email = $data['email'];
            } else {
                $validator->errors()->add('email', __('validation.unique', [
                    'attribute' => 'email'
                ]));
            }
        }

        // Verificando se o usuário digitou senha
        if(!empty($data['password'])) {
            if(strlen($data['password']) >= 4) {
                // Alterar a senha
                $user->password = Hash::make($data['password']);
            } else {
                $validator->errors()->add('password', __('validation.min.string', [
                    'attribute' => 'password',
                    'min' => 4
                ]));
            }
        }

        if(count( $validator->errors() ) > 0) {
            return redirect()->route('profile', [
                'user' => $loggeId
            ])->withErrors($validator);
        }

            $user->save();

            return redirect()->route('profile')
                    ->with('warning', 'Informações alteradas com sucesso!');
    } 
        return redirect()->route('profile');
    

}

}
