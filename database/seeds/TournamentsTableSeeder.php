<?php
declare(strict_types=1);
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class TournamentsTableSeeder
 */
class TournamentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        /** @var \Carbon\Carbon $date */
        $date = now();
        DB::table('tournaments')->insert([
            'id'            => 1,
            'name'          => 'Championship 2019',
            'created_at'    => $date,
            'updated_at'    => $date,
        ]);
    }
}
