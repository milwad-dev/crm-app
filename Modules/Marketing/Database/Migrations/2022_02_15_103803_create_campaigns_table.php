<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->nullable();
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('count_email_readed');
            $table->string('budget');
            $table->string('real_cost');
            $table->string('expected_income');
            $table->string('expected_cost');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('target');
            $table->text('description');
            $table->enum('status', \Modules\Marketing\Models\Campaign::$statuses);
            $table->enum('type', \Modules\Marketing\Models\Campaign::$types);
            $table->enum('type_money', \Modules\Marketing\Models\Campaign::$type_moneies)
            ->default(\Modules\Marketing\Models\Campaign::TYPE_MONEY_DOLLAR);
            $table->enum('answer', \Modules\Marketing\Models\Campaign::$answers);
            $table->timestamps();
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('SET NULL');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}
