<?php
declare(strict_types=1);
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateTournamentStatsTable
 */
class CreateTournamentStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tournament_stats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tournament_id');
            $table->unsignedBigInteger('team_id');
            $table->unsignedTinyInteger('count_matches')->default(0);
            $table->unsignedTinyInteger('place_in_tournament')->default(16);
            $table->unsignedTinyInteger('count_score')->default(0);
            $table->float('average_score', 4, 2)->default(0);
            $table->unsignedTinyInteger('high_score')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tournament_id')
                ->references('id')
                ->on('tournaments');

            $table->foreign('team_id')
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
        Schema::table('tournament_stats', function (Blueprint $table) {
            $table->dropForeign(['tournament_id']);
            $table->dropForeign(['team_id']);
        });

        Schema::dropIfExists('tournament_stats');
    }
}
