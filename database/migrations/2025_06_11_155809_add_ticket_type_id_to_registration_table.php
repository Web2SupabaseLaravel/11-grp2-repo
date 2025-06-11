<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::table('registration', function (Blueprint $table) {
        $table->foreignId('ticket_type_id')->nullable()->constrained('ticket_type')->onDelete('set null');
    });
}

public function down(): void
{
    Schema::table('registration', function (Blueprint $table) {
        $table->dropForeign(['ticket_type_id']);
        $table->dropColumn('ticket_type_id');
    });
}


};
