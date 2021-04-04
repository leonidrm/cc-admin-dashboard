<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewslettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('newsletters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campaign_id');
            $table->string('subject');
            $table->string('variant');
            $table->json('tags');
            $table->string('list');
            $table->dateTime('send_date');
            $table->string('week_day');
            $table->integer('total_recipients');
            $table->integer('unique_placed_orders');
            $table->float('placed_order_rate');
            $table->float('revenue');
            $table->integer('unique_opens');
            $table->float('open_rate');
            $table->integer('total_opens');
            $table->integer('unique_clicks');
            $table->float('click_rate');
            $table->integer('total_clicks');
            $table->integer('unsubscribes');
            $table->integer('spam_complaints');
            $table->float('spam_complaints_rate');
            $table->integer('successful_deliveries');
            $table->integer('bounces');
            $table->float('bounce_rate');
            $table->string('campaign_channel');
            $table->string('campaign_identifier');
            $table->tinyInteger('winning')->default(1)->unsigned();
            $table->timestamps();
            $table->foreign('campaign_id')->references('id')->on('campaigns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('newsletters');
    }
}
