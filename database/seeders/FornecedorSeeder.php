<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'fornecedor100@hotmail.com';
        $fornecedor->save();

        Fornecedor::create([
            'nome'=> 'Fornecedor 200',
            'site' => 'fornecedor200.com.br',
            'uf' => 'SP',
            'email'=> 'fornecedor200@gmail.com'
        ]);
    }
}
