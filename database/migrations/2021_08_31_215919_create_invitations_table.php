<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id("invitation_id");
            $table->integer("user_id", false);
            $table->integer("theme_id", false);
            $table->string("invitation_url");
            $table->integer("current_step")->default(1);
            $table->string("cover_photo")->nullable();
            $table->string("timezone")->nullable();
            $table->json("invitation_meta")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invitations');
    }
}
