<?php

namespace Database\Seeders;

use App\Contracts\Services\ImagesServiceContract;
use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(ImagesServiceContract $imagesServiceContract): void
    {
//        foreach ($this->banners() as $banner) {
//            if (!empty($banner['image'])) {
//                $image =
//                    $imagesServiceContract->createImage(resource_path($banner['image']));
//                $banner['image_id'] = $image->id;
//            }
//            unset($banner['image']);
//            Banner::factory()->create($banner);
//        }
        Banner::factory()->count(12)->create();
        }

    public function banners(): array
    {
        return [
            [
                'title' => 'Купи Астон Мартин, получи секретное Задание',
                'description' => 'Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием истинности
                        необходимость и&nbsp;общезначимость, для&nbsp;которых нет никакой опоры в&nbsp;объективном мире',
                'link' => '#',
                'image' => '/assets/pictures/test_banner_1.jpg'
            ],
            [
                'title' => 'Купи Роллс Ройс, получи Отчество к&nbsp;своему имени',
                'description' => 'Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием истинности
                        необходимость и&nbsp;общезначимость, для&nbsp;которых нет никакой опоры в&nbsp;объективном мире',
                'link' => '#',
                'image' => '/assets/pictures/test_banner_2.jpg'
            ],
            [
                'title' => 'Купи Бентли, получи бейсболку',
                'description' => 'Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием истинности
                        необходимость и&nbsp;общезначимость, для&nbsp;которых нет никакой опоры в&nbsp;объективном мире',
                'link' => '#',
                'image' => '/assets/pictures/test_banner_3.jpg'
            ]
        ];
    }
}
