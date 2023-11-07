<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {   //creazione colonne all'interno della tabella annunci.
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();//colonna id.
            $table->string('title');//colonna titolo.
            $table->longText('description');//colonna con metodo longText inserimento descrizione.
            $table->decimal('price', 8, 2);//colonna prezzo.
            $table->timestamps();//colonna data di creazione.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
