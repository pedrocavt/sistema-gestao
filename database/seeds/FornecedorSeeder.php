<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instancia um objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'Fornecedor100.com.br';
        $fornecedor->uf = 'DF';
        $fornecedor->email = 'fornecedor100@gmail.com';
        $fornecedor->save();

        //o método create (atenção para o atributo fillable da classe)
        Fornecedor::create([
            'nome'  => 'Fornecedor 200',
            'site'  => 'fornecedor200.com.br',
            'uf'    => 'SP',
            'email' => 'fornecedor200@gmail.com'
        ]);

        //insert
        DB::table('fornecedores')->insert([
            'nome'  => 'Fornecedor 300',
            'site'  => 'fornecedor300.com.br',
            'uf'    => 'SC',
            'email' => 'fornecedor300@gmail.com'
        ]);

    }
}
