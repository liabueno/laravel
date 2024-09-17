<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request){

        $erro = '';

        if($request->get('erro') == 1){
            $erro = 'Usuário e/ou senha não existe(m)';
        }

        return View('site.login', ['pagina' => 'Página de ', 'erro' => $erro]); // PASSANDO O ERRO COMO PARAM PARA VIEW
    }

    public function autenticar(Request $request){
        // return 'Chegamos até aqui!';

        // FEEDBACK CONFORME REGRA
        $regras = [
            'email' => 'email',
            'password' => 'required'
        ];

        $feedback = [
            'email.email' => 'O campo usuário (e-mail) é obrigatório',
            'password.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        // INSERT INTO `users`( `name`, `email`,  `password`) VALUES ('Júlia','julia@exemplo.com','Senha123');


        // RECUPERANDO DADOS DO FORMULÁRIO
        $email = $request->get('email'); // PEGANDO OS VALORES
        $password = $request->get('password');

        $user = new User();

        $usuario = $user->where('email', $email) // PEGANDO O REGISTRO PARA COMPARAR
                        ->where('password', $password)
                        ->get()
                        ->first(); 

        echo "E-mail: $email <br>"; //EXIBINDO OS DADOS DO USER QUE DEU ENTRADA
        echo "Senha: $password <br>";

        if(isset($usuario->name)){
            // echo "Usuário Encontrado";
            session_start(); // SESSÃO, PERÍODO DE USO DO USER
            $_SESSION['name'] = $usuario->name; // PEGANDO DO REGISTRO ESCOLHIDO 
            $_SESSION['email'] = $usuario->email; // COMPARA

            dd($_SESSION); // EXIBE

            // array:2 [▼ // app\Http\Controllers\LoginController.php:56
            // "name" => "Júlia"
            // "email" => "julia@exemplo.com"

        } else {
            return redirect()->route('site.login', ['erro' => 1]); 
            // SE NN FOR O MESMO, RETORNA O ERRO DE NÃO ENCONTRADO
        }

        // print_r($request->all());
    
    }
}
