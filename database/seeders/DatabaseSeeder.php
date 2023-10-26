<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::truncate();
        Post::truncate();
        Category::truncate();
        
        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);
           Post::factory(7)->create([
            'user_id' => $user->id
           ]);


//        $user = User::factory()->create();

//        $personal = Category::create([
//         'name'=>'Personal',
//         'slug'=>'personal'
//        ]);

//        $family = Category::create([
//         'name'=>'Family',
//         'slug'=>'family'
//        ]);

//        $work = Category::create([
//         'name'=>'Work',
//         'slug'=>'work'
//        ]);

//        Post::create([
//         'user_id' => $user->id,
//         'category_id' => $family->id,
//         'title' => 'My Family Post',
//         'slug' => 'my-first-post',
// 'excerpt' => 'Lorem ipsum dollar sit amet.',
// 'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat adipisci
//  numquam iste animi enim eveniet repudiandae sunt dignissimos vero ducimus fuga, omnis blanditiis
//   nobis esse quis, cumque facere, dolore consequatur qui dolores atque! Vel magni cum vero ab quisquam
//    minus, quia obcaecati debitis veritatis nemo, laboriosam enim. Temporibus, fugit fuga nobis eveniet 
//    illo necessitatibus repellat dolorum. Eum impedit harum ducimus repellendus officia soluta perferendis
//     atque nam blanditiis. Aliquid ab temporibus quas, illo nulla sapiente error! Itaque ullam nihil ad ratione 
//     at minima unde quis in iste earum exercitationem vel iusto, accusamus praesentium doloribus reprehenderit, 
//     doloremque quas explicabo architecto. Delectus possimus, labore asperiores suscipit quasi rem odit incidunt
//      voluptatibus voluptate adipisci vel atque eum dolore aperiam eaque voluptatem illum nemo nesciunt impedit
//       consequuntur ipsam laboriosam? Ex illo magni necessitatibus perspiciatis consectetur corporis possimus, 
//       maxime nostrum omnis, adipisci sit ipsum voluptatibus magnam quam? Dolores suscipit fugiat nobis illum, 
//       nihil minus modi molestias.</p>'
//        ]);

//       Post::create([
//         'user_id' => $user->id,
//         'category_id' => $work->id,
//         'title' => 'My work Post',
//         'slug' => 'my-work-post',
// 'excerpt' => 'Lorem ipsum dollar sit amet.',
// 'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat adipisci
//  numquam iste animi enim eveniet repudiandae sunt dignissimos vero ducimus fuga, omnis blanditiis
//   nobis esse quis, cumque facere, dolore consequatur qui dolores atque! Vel magni cum vero ab quisquam
//    minus, quia obcaecati debitis veritatis nemo, laboriosam enim. Temporibus, fugit fuga nobis eveniet 
//    illo necessitatibus repellat dolorum. Eum impedit harum ducimus repellendus officia soluta perferendis
//     atque nam blanditiis. Aliquid ab temporibus quas, illo nulla sapiente error! Itaque ullam nihil ad ratione 
//     at minima unde quis in iste earum exercitationem vel iusto, accusamus praesentium doloribus reprehenderit, 
//     doloremque quas explicabo architecto. Delectus possimus, labore asperiores suscipit quasi rem odit incidunt
//      voluptatibus voluptate adipisci vel atque eum dolore aperiam eaque voluptatem illum nemo nesciunt impedit
//       consequuntur ipsam laboriosam? Ex illo magni necessitatibus perspiciatis consectetur corporis possimus, 
//       maxime nostrum omnis, adipisci sit ipsum voluptatibus magnam quam? Dolores suscipit fugiat nobis illum, 
//       nihil minus modi molestias.</p>'
//        ]);

      




        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
