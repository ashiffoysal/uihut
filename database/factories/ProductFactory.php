<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        $slug = Str::slug($title, '-');
        $catslug = Category::findOrFail(rand(5,8))->slug;
        $subcatslug = SubCategory::findOrFail(rand(3,10))->slug;
        $img = ['th_1623144058.jpg','th_1622963747.png','th_1623666350.jpg'];
        return [
            'title'=>$title,
            'slug'=>$title,
            'cate_id'=>rand(5,9),
            'cat_slug'=>$catslug,
            'subcate_id'=>rand(3,11),
            'subcat_slug'=>$subcatslug,
            'resubcate_id'=>rand(1,7),
            'tag'=>'fdgfd,dsafdsa,dsafds,fsdafdsa,sdafdsa',
            'description'=>$this->faker->paragraph,
            'product_type'=>rand(1,2),
            'file_type'=>rand(1,2),
            'software'=>json_encode(["1","2","3","4"]),
            'link'=>json_encode(["#"]),
            'gallery_img'=>json_encode(["60c6fcd01d0ba.jpg","60c6fcd025f6e.jpg","60c6fcd02a04a.jpg"]),
            'thumbnail_img'=>$img[rand(0,2)],
            'creator_by'=>1,
            'draft'=>1,
            'status'=>1,
            'is_deleted'=>0,
        ];
    }
}
