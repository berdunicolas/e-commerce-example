<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('calendar_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calendarable_id');
            $table->string('calendarable_type');
            $table->string('title');
            $table->text('description')->nullable();
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->string('color')->nullable();
            $table->timestamps();

            $table->index(['calendarable_type', 'calendarable_id'], 'calendarable_index');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calendar_events');
    }
};
