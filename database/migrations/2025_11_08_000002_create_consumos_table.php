<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('consumos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('setor_id')->constrained('setores')->onDelete('cascade');
            $table->string('mes');
            $table->year('ano');
            $table->decimal('energia_kwh', 10, 2)->default(0);
            $table->decimal('agua_litros', 10, 2)->default(0);
            $table->decimal('materiais_kg', 10, 2)->default(0);
            $table->decimal('producao', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consumos');
    }
};
