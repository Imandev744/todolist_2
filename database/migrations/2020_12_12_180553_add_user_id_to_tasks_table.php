<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToTasksTable extends Migration
{

    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreignIdFor(User::class)->after('id');
        });
    }


    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {

        });
    }
}
