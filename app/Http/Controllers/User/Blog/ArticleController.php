<?php

namespace App\Http\Controllers\User\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Blog\BlogArticleResource;
use App\Model\Blog\b_article;
use App\Model\Blog\b_group;
use App\Model\Tags\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Psy\Util\Json;
use function GuzzleHttp\json_decode;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,b_article $b_article)
    {

       return BlogArticleResource::collection($b_article->where('group',$request->group)->where('name','like','%'.$request->search.'%')->with('totags')->paginate(10));
    }

    /**
     * Show the form fo creating a new resource.
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
    public function store(Request $request,b_article $b_article)
    {
        $request->validate([
            'name'=>[
                'required',
                Rule::notIn(['null']),
            ],
            'groups'=>[
                'required',

            ],
            'url'=>[
                'required',
                Rule::notIn(['null']),
                'unique:b_articles,url'
            ]
        ]);
        $save= new $b_article;
        $save->name= $request->name;
        $save->publish= 1;
        $save->text= $request->text;
        $save->url= $request->url;
        $save->keywords= $request->keywords;
        $save->group= $request->groups;
        $save->description= $request->description;
        $save->save();
        if($request->file!=null){
            self::uploafile($request->file,$save->id);

        }

        self::tagmanager($save->id,$request->tag);
        return $save->id;
    }
    private function uploafile($file,$id)

    {
        $address='Articles/'.$id;
        Storage::disk('media')->makeDirectory($address);
        $manager = new ImageManager();
        $manager->make($file)->resize(300,150)->save(public_path().'/media/Articles/'.$id.'/thump.png');
        $manager->make($file)->save(public_path().'/media/Articles/'.$id.'/orginal.png');
        $manager->make($file)->resize(150,75)->save(public_path().'/media/Articles/'.$id.'/mini.png');
        $group=  new b_article();
        $save=$group->find($id);
        $save->image=1;

        $save->save();

    }
    private function tagmanager($id,$tags){
        $tags=json_decode($tags);
        $array=[];

        foreach($tags as $key){
            if(isset($key->text)){
                array_push($array,$key->text);

            }else{
                array_push($array);
            }
        }
        $article=new b_article();
        $article=$article->find($id);
        $sync=array();
        foreach($array as $key){
            $tag= tag::firstOrCreate(['name'=>$key]);
            array_push($sync,$tag->id);
        }
        $article->totags()->sync($sync);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,b_article $b_article)
    {
        $request->validate([
            'name'=>[
                'required',
                Rule::notIn(['null']),
            ],
            'url'=>[
                'required',
                Rule::notIn(['null']),
                Rule::unique('b_groups','url')->ignore($id),
            ]
        ]);
        $save=  $b_article->where('id',$id)->first();
        $save->name= $request->name;
        $save->publish= 1;
        $save->text= $request->text;
        $save->url= $request->url;
        $save->keywords= $request->keywords;
        $save->description= $request->description;
        $save->save();
        if($request->file!=null){
            self::uploafile($request->file,$save->id);


        }
        $tags=$request->tag;



        self::tagmanager($save->id,$request->tag);

        return $save->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,b_article $b_article)
    {
        Storage::disk('filemanager')->deleteDirectory('/Articles/'.$id);
        Storage::disk('media')->deleteDirectory('/Blog/'.$id);
        $b_article->where('id',$id)->delete();

    }
}
