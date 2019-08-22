<?php
declare(strict_types=1);
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Class CreatePlayoffAdminMenu
 */
class CreatePlayoffAdminMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        DB::table('admin_menu')->delete(1);

        /** @var int $rootId */
        $rootId = DB::table('admin_menu')->insertGetId(
            [
                'parent_id'     => 0,
                'order'         => 1,
                'title'         => 'Playoff',
                'icon'          => 'fa-trophy',
                'uri'           => '/',
                'permission'    => '*',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]
        );

        DB::table('admin_menu')->insert([
            [
                'parent_id'     => $rootId,
                'order'         => 2,
                'title'         => 'Tournament statistics',
                'icon'          => 'fa-info-circle',
                'uri'           => '/playoff/tournament-stats',
                'permission'    => '*',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'parent_id'     => $rootId,
                'order'         => 3,
                'title'         => 'Tournament matches',
                'icon'          => 'fa-soccer-ball-o',
                'uri'           => '/playoff/tournament-matches',
                'permission'    => '*',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'parent_id'     => $rootId,
                'order'         => 4,
                'title'         => 'Tournaments',
                'icon'          => 'fa-list-ol',
                'uri'           => '/playoff/tournaments',
                'permission'    => '*',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'parent_id'     => $rootId,
                'order'         => 5,
                'title'         => 'Matches',
                'icon'          => 'fa-gamepad',
                'uri'           => '/playoff/matches',
                'permission'    => '*',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'parent_id'     => $rootId,
                'order'         => 6,
                'title'         => 'Teams',
                'icon'          => 'fa-users',
                'uri'           => '/playoff/teams',
                'permission'    => '*',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        //
    }
}
