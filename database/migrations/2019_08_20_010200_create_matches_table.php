<?php
declare(strict_types=1);
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateMatchesTable
 */
class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('top_team_id');
            $table->unsignedBigInteger('bottom_team_id');
            $table->unsignedSmallInteger('top_team_score')->default(0);
            $table->unsignedSmallInteger('bottom_team_score')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('top_team_id')
                ->references('id')
                ->on('teams');

            $table->foreign('bottom_team_id')
                ->references('id')
                ->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->dropForeign(['top_team_id']);
            $table->dropForeign(['bottom_team_id']);
        });

        Schema::dropIfExists('matches');
    }
}
