<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *       $table->string('desc');
     *       $table->string('nome');
     *       $table->integer('etapa')->unsigned();
     */

	// Este comando "desabilita" a proteção do método fill($data = []); nos models
    // Model::unguard();

    // Apaga toda a tabela de usuários
    // DB::table('users')->truncate();

	// Index =================================
	// Abrir Acesso 1
	// 
	// 
	// 

	// Pre leitura ===========================
	// Pre leitura Abrir Pag Resumo 11
	// Pre leitura Abrir Pag Duvidas 12
	// Pre leitura Abrir Pag Certezas 13
	// Pre leitura Registro de Nova Dúvida 14
	// Pre leitura Registro de Nova Certeza 15

	// Leitura Acesso Documento =============== 
	// Abriu Documento 20
	// Leitura Leitura iniciada 21
	// Leitura Leitura finalizada 22
	// Leitura Aviso Aceite/Concordancia 23
	// Leitura Aviso Voltou 24

	// Leitura Acesso Acervo ==================
	// Abrir Pag Acervo 31 
	// Leitura Registro de Nova Dúvida 
	// Leitura Registro de Nova Certeza

	// Leitura Registro Resposta Pergunta Conceitual
	// Leitura Registro Resposta Pergunta Personalizada
	// Leitura Registro Posicionamento

	// Leitura Registro Justificativa

    public function run()
    {
    	DB::table('tipos')->insert([
    		'desc' => "Inicio da leitura documento",
    		'nome' => 'Inicio Leitura',
    		'etapa' => 1,
    		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    	]);

    	DB::table('tipos')->insert([
    		'desc' => "Fim da leitura do documento",
    		'nome' => 'Fim Leitura',
    		'etapa' => 2,
    		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    	]);



    	DB::table('tipos')->insert([
    		'desc' => "F1 Acesso Pag Resumo",
    		'nome' => "Pre Resumo",
    		'etapa' => 3,
    		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    	]);

    	DB::table('tipos')->insert([
    		'desc' => "F1 Acesso Pag Duvidas",
    		'nome' => 'Pre Duvidas',
    		'etapa' => 4,
    		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    	]);

    	DB::table('tipos')->insert([
    		'desc' => "F1 Acesso Pag Certezas",
    		'nome' => 'Pre Certezas',
    		'etapa' => 5,
    		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    	]);

    	DB::table('tipos')->insert([
    		'desc' => "F1 Autoria Registro de Nova Dúvida",
    		'nome' => 'Pre NovaDuvida',
    		'etapa' => 6,
    		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    	]);

        DB::table('tipos')->insert([
            'desc' => "F1 Autoria Registro de Nova Certeza",
            'nome' => 'Pre NovaCerteza',
            'etapa' => 7,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);



    	DB::table('tipos')->insert([
    		'desc' => "F2 Acesso Documento",
    		'nome' => 'Acesso Doc',
    		'etapa' => 8,
    		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    	]);

    	DB::table('tipos')->insert([
    		'desc' => "F2 Leitura Aviso Aceite/Concordancia",
    		'nome' => "F2 Aceite",
    		'etapa' => 9,
    		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    	]);

    	DB::table('tipos')->insert([
            'desc' => "F2 Leitura Aviso Aceite/Concordancia",
            'nome' => "F2 Aceite",
            'etapa' => 10,
    		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    	]);

        DB::table('tipos')->insert([
            'desc' => "F2 Não Aceitou e Voltou",
            'nome' => "F2 Não Aceitou e Voltou ",
            'etapa' => 11,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


    	DB::table('tipos')->insert([
    		'desc' => "F2 Acesso Acervo",
    		'nome' => 'F2 Acesso Acervo',
    		'etapa' => 12,
    		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    	]);

    	DB::table('tipos')->insert([
    		'desc' => "F2 ACERVO Nova Dúvida",
    		'nome' => 'F2 ACERVO Nova Dúvida',
    		'etapa' => 13,
    		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    	]);

        DB::table('tipos')->insert([
            'desc' => "F2 ACERVO Nova Certeza",
            'nome' => 'F2 ACERVO Nova Certeza',
            'etapa' => 14,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tipos')->insert([
            'desc' => "F2 Apresenta Pergunta",
            'nome' => 'F2 Apresenta Pergunta',
            'etapa' => 15,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tipos')->insert([
            'desc' => "F2 Autoria Resposta Pergunta",
            'nome' => 'F2 Autoria Resposta Pergunta',
            'etapa' => 16,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('tipos')->insert([
            'desc' => "F2 Autoria Posicionamento",
            'nome' => 'F2 Autoria Posicionamento',
            'etapa' => 17,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tipos')->insert([
            'desc' => "F2 Autoria Justificativa",
            'nome' => 'F2 Autoria Justificativa',
            'etapa' => 18,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tipos')->insert([
            'desc' => "F3 Esclarece Dúvida",
            'nome' => 'F3 Esclarece Dúvida',
            'etapa' => 19,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


    	DB::table('tipos')->insert([
    		'desc' => "F3 Apropria Dúvida ",
    		'nome' => 'F3 Apropria Dúvida',
    		'etapa' => 20,
    		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    	]);

        DB::table('tipos')->insert([
            'desc' => "Quando o usuário desiste da intervenção",
            'nome' => 'Fechou/Saiu da Pergunta ',
            'etapa' => 21,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

    }
}
