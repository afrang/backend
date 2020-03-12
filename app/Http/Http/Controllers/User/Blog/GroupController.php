<?php

namespace App\Http\Controllers\User\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Blog\BlogGroupResource;
use App\Model\Blog\b_blog;
use App\Model\Blog\b_group;
use App\Model\Tags\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use PhpParser\Node\Stmt\Return_;
use Intervention\Image\ImageManager;

use function GuzzleHttp\json_decode;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(b_group $b_group)
    {
        return BlogGroupResource::collection($b_group->with('totags')->get());
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
    public function store(Request $request,b_group $b_group)
    {

        $request->validate([
            'name'=>[
                'required',
                Rule::notIn(['null']),
            ],
            'url'=>[
                'required',
                Rule::notIn(['null']),
                'unique:b_groups,url'
            ]
            ]);
            $save= new $b_group;
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

                self::tagmanager($save->id,$request->tag);
        return $save->id;


    }
    private function uploafile($file,$id)
    {
        $address='BlogGroup/'.$id;
        Storage::disk('media')->makeDirectory($address);
        $manager = new ImageManager();
        $manager->make($file)->resize(300,150)->save(public_path().'/media/BlogGroup/'.$id.'/thump.png');
        $manager->make($file)->save(public_path().'/media/BlogGroup/'.$id.'/orginal.png');
        $manager->make($file)->resize(150,75)->save(public_path().'/media/BlogGroup/'.$id.'/mini.png');
        $group=  new b_group();
        $save=$group->find($id);
        $save->image=1;

        $save->save();

    }
    private function tagmanager($id,$tags){
        $tags=json_decode($tags);
        $array=[];
        foreach($tags as $key){
              array_push($array,$key->text);
        }
        $blog=new b_group();
        $blog=$blog->find($id);
        $sync=array();
        foreach($array as $key){
          $tag= tag::firstOrCreate(['name'=>$key]);
          array_push($sync,$tag->id);
        }
        $blog->totags()->sync($sync);

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
    public function update(Request $request, $id,b_group $b_group)
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
            $save=  $b_group->where('id',$id)->first();
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
    public function destroy($id)
    {
        //
    }
}
