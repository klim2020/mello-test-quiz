<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //Для генерации токенов
    public function token(Request $request){

        //проверка введенных данных
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'email'=> ['required', 'string', 'email', 'max:255'],
            'password'=>['required', 'string']
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        // поиск пользователя на основе данных
        $user = User::where('name', $request->name)
                    ->where('email',$request->email)
                    ->first();
        //проверка пароля
        if (!Hash::check($request->password, $user->password)){
            return response()->json(['errors' => ['user' => 'password dont match']], 401);
        }
        //генерация токена
        return response()->json(['token' => $user->createToken($request->name)->plainTextToken]);


    }
}
