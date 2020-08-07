<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(7);
        
        return view('site.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('site.users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $data = $request->only([
            'name',
            'cpf',
            'email',
            'password'
        ]);
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'cpf' => ['required', 'string', 'cpf', 'max:14', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:4']
        ]);

        if($validator->fails()) {
            return redirect()->route('users.create')
            ->withErrors($validator)
            ->withInput();
        }
        
        $user = new User;
        $user->name = $data['name'];
        $user->cpf = $data['cpf'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        if($user) {
            return view('site.users.edit', [
                'user' => $user
            ]);
        }

        return redirect()->route('users.index');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $user = User::find($id);

        if($user) {
            $data = $request->only([
                'name',
                'cpf',
                'email',
                'password'
            ]);
            $validator = Validator::make([
                'name' => $data['name'],
                'cpf' => $data['cpf'],
                'email' => $data['email']
            ], [
                'name' => ['required', 'string', 'max:100'],
                'cpf' => ['required', 'string', 'cpf', 'max:14'],
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

             // Verificando se o cpf foi alterado
             if($user->cpf != $data['cpf']) {
                // Verificando se o novo cpf já existe
                $hasCpf = User::where('cpf', $data['cpf'])->get();
                 // Se não existir cpf, sera alterado
                if(count($hasCpf) === 0) {
                    $user->cpf = $data['cpf'];
                } else {
                    $validator->errors()->add('cpf', __('validation.unique', [
                        'attribute' => 'cpf'
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
                return redirect()->route('users.edit', [
                    'user' => $id
                ])->withErrors($validator);
            }

                $user->save();

                return redirect()->route('users.index')
                    ->with('warning', 'Novas informações salvas com sucesso!');
        } 
            return redirect()->route('profile.index');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
