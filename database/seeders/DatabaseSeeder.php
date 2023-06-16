<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use App\Models\Widget;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory()->create();
         Setting::create([
             'option'=>'title',
             'value'=>'blog'
         ]);
         Setting::create([
            'option'=>'logo',
            'value'=>'logo.png'
        ]);
         Widget::create([
             'name'=>'درباره من',
             'slug'=>'درباره-من',
             'icon'=>'bx bx-info-square',
             'content'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ducimus et, soluta illo vero fugiat maiores sequi cum voluptatibus aperiam sed eos exercitationem voluptates commodi nesciunt, reiciendis totam provident possimus.'
         ]);

    }
}
