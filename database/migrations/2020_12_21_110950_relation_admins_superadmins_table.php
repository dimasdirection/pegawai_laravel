<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Util\Xml\SchemaDetector;

class RelationAdminsSuperadminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    //     Schema::table('superadmins', function (Blueprint $table) {
    //         $table->integer('admin_id')->unsigned()->change();
    //         $table->foreign('admin_id')->references('id_admin')->on('admins')
    //             ->onUpdate('cascade')->onDelete('cascade');
    //     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    //     Schema::table('superadmins', function(Blueprint $table) {
    //         $table->dropForeign('superadmins_admin_id_foreign');
    //     });
    // ​
    //     Schema::table('superadmins', function(Blueprint $table) {
    //         $table->dropIndex('superadmins_admin_id_foreign');
    //     });
    // ​
    //     Schema::table('superadmins', function(Blueprint $table) {
    //         $table->integer('admin_id')->change();
    //     });
    }
}
