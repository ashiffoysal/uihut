<?php
namespace App\Helper;
use App\Models\SoftwareType;

class SoftwareRelationship
{
    /**
     * Get and relation with shoftware type table using id resource instance.
     *
     * @param  mixed  $resource
     * @return $shoftware name
     */

    public static function doRelation($softwaresID,$links){
        if(is_null($softwaresID) || is_null($links)){
            return [];
        }
        $softwaresID = json_decode($softwaresID);
        $software = [];
        foreach ($softwaresID as $id) {
            $name =self::getName($id);
            array_push($software,$name);
        }

        $links = json_decode($links);
        $linkdata = [];
        foreach ($links as $link) {
            array_push($linkdata,$link);
        }

        return array_combine($software,$linkdata);
    }

    /**
     * get Shofware name.
     *
     * @param  mixed  $resource
     * @return name
     */

     public static function getName($id)
     {
        $software =SoftwareType::findOrFail($id);
        return $software->name;
     }


}
