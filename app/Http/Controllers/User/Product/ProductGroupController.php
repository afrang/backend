<?php

namespace App\Http\Controllers\User\Product;

use  App\Http\Controllers\Controller;
use App\Model\Attr\attr_product;
use App\Model\Attr\feature_attr;
use App\Model\Blog\b_article;
use App\Model\Product\p_group;
use App\Model\Tags\tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function GuzzleHttp\json_decode;

class ProductGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,p_group $group)
    {
        return $group->where('sub',$request->sub)->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,p_group $group)
    {
        $request->validate([
            'url'=>[
                'required',
                Rule::notIn(['null']),
                'unique:p_groups,url'
            ],
            'name'=>[ 'required']

        ]);
        $save           =new $group;
        $save->name     =$request->name;
        $save->url      =$request->url;
        $save->save();
        return  $save;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product\p_group  $p_group
     * @return \Illuminate\Http\Response
     */
    public function show($id,p_group $p_group)
    {
        return  $p_group->where('id',$id)->with('toColor','toTags','toFeature','toAttr')->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product\p_group  $p_group
     * @return \Illuminate\Http\Response
     */
    public function edit(p_group $p_group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product\p_group  $p_group
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request, p_group $p_group)
    {
        $request->validate([
            'url'=>[
                'required',
                Rule::unique('p_groups','url')->ignore($id),
            ],
            'name'=>[ 'required']

        ]);
        $save                   =p_group::where('id',$id)->with('toColor','toTags','toFeature','toAttr')->first();
        $save->name             =$request->name;
        $save->url              =$request->url;
        $save->sub              =$request->sub;
        $save->menuitem         =$request->menuitem;
        $save->keywords         =$request->keywords;
        $save->description      =$request->description;
        $save->text             =$request->text;
        $save->seotext          =$request->seotext;
        $save->thump            =$request->thump;
        $save->icon             =$request->icon;
        $save->title            =$request->title;
        $save->save();
        self::tagmanager($save->id,$request->tag);

        $attr=json_decode($request->attrs);
        $array=[];
        foreach($attr as $key){
            if(isset($key->text)){
                array_push($array,$key->text);
            }else{
                array_push($array,$key);
            }
        }
        $sync=array();
        foreach($array as $key){
            $tag= attr_product::firstOrCreate(['name'=>$key]);
            array_push($sync,$tag->id);
        }
        $save->toAttr()->sync($sync);


        $attr=json_decode($request->fea);
        $array=[];
        foreach($attr as $key){
            if(isset($key->text)){
                array_push($array,$key->text);
            }else{
                array_push($array,$key);
            }
        }
        $sync=array();
        foreach($array as $key){
            $tag= feature_attr::firstOrCreate(['name'=>$key]);
            array_push($sync,$tag->id);
        }

        $save->toFeature()->sync($sync);

            return  $save;
    }
    private function attrmanager($id,$attr){

    }
    private function tagmanager($id,$tags){
        $tags=json_decode($tags);
        $array=[];

        foreach($tags as $key){
            if(isset($key->text)){
                array_push($array,$key->text);

            }else{
                array_push($array,$key);
            }
        }
        $group=new p_group();
        $group=$group->find($id);
        $sync=array();
        foreach($array as $key){
            $tag= tag::firstOrCreate(['name'=>$key]);
            array_push($sync,$tag->id);
        }
        $group->toTags()->sync($sync);



    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product\p_group  $p_group
     * @return \Illuminate\Http\Response
     */
    public function destroy(p_group $p_group)
    {
        //
    }
}
