<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name')
                ->nullable(false);

            $table->longText('description')
                ->nullable(false);

            $table->date('start_date')
                ->nullable(false);

            $table->boolean('allow_registration')
                ->default(false);

            $table->boolean('allow_registration_from_external_students')
                ->default(false);

            $table->integer('duration')
                ->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
