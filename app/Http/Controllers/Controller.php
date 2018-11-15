<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use App\Entity;
use App\MetaCol;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function generate()
    {
        // set_time_limit(0);

        for ($i=0; $i <2000 ; $i++) {
            DB::transaction(function() {
                $this->_generate();
             });
        }

        return view('welcome');
    }

    function _generate()
    {
        $weight = rand(40, 100);

        $height = rand(140, 180);

        $age = rand(10, 80);

        $info = [
            'weight' => $weight,
            'height' => $height,
            'age' => $age
        ];

        $entity = new Entity();

        $entity->weight = $weight;
        $entity->height = $height;
        $entity->age = $age;
        $entity->text_info = json_encode($info);
        $entity->json_info = json_encode($info);
        $entity->save();

        $meta1 = new MetaCol();

        $meta1->entity_id = $entity->id;
        $meta1->meta_key = 'weight';
        $meta1->meta_value = $weight;
        $meta1->save();

        $meta2 = new MetaCol();

        $meta2->entity_id = $entity->id;
        $meta2->meta_key = 'height';
        $meta2->meta_value = $height;
        $meta2->save();

        $meta3 = new MetaCol();

        $meta3->entity_id = $entity->id;
        $meta3->meta_key = 'age';
        $meta3->meta_value = $age;
        $meta3->save();
    }
}
