<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
// database/migrations/xxxx_xx_xx_create_rooms_table.php

public function up()
{
    Schema::create('rooms', function (Blueprint $table) {
        $table->id();
        $table->string('number')->unique();
        $table->string('type');
        $table->decimal('price', 8, 2);
        $table->boolean('is_available')->default(true);
        $table->string('image')->nullable(); // Tambahkan kolom ini
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
