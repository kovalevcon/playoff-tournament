<?php
declare(strict_types=1);
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateTournamentMatchesTable
 */
class CreateTournamentMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tournament_matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tournament_id');
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('top_match_id')->nullable();
            $table->unsignedBigInteger('bottom_match_id')->nullable();
            $table->unsignedTinyInteger('match_number');
            $table->string('stage', 10);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tournament_id')
                ->references('id')
                ->on('tournaments');

            $table->foreign('match_id')
                ->references('id')
                ->on('matches');

            $table->foreign('top_match_id')
                ->references('id')
                ->on('matches');

            $table->foreign('bottom_match_id')
                ->references('id')
                ->on('matches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('tournament_matches', function (Blueprint $table) {
            $table->dropForeign(['tournament_id']);
            $table->dropForeign(['match_id']);
            $table->dropForeign(['top_match_id']);
            $table->dropForeign(['bottom_match_id']);
        });

        Schema::dropIfExists('tournament_matches');
    }
}
