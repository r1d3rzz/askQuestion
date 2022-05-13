<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $mgmg = User::factory()->create(['name'=>'Mg Mg','username'=>'mgmg']);
        $aungaung = User::factory()->create(['name'=>'Aung Aung','username'=>'aungaung']);

        $frontend = Category::factory()->create(['name'=>'Frontend','slug'=>'frontend']);
        $backend = Category::factory()->create(['name'=>'Backend','slug'=>'backend']);

        Question::factory(2)->create(['user_id'=>$mgmg->id,'category_id'=>$frontend->id]);
        Question::factory(2)->create(['user_id'=>$aungaung->id,'category_id'=>$backend->id]);
    }
}
