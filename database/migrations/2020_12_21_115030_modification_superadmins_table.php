<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModificationSuperadminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('superadmins', function(Blueprint $table) {
        //     $table->integer('admin_id')->after('id_super_admin');
        //  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    //     Schema::table('superadmins', function($table) {
    //         $table->dropColumn('admin_id');
    //       });
    // }
}
}
