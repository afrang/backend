<?php

namespace App\Http\Controllers\View\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdcutThumpnailResource;
use App\Model\Product\p_group;
use App\Model\Product\p_prodcut;
use Illuminate\Http\Request;
use mysql_xdevapi\Collection;

class ProductSearchControllerView extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,p_prodcut $p_prodcut,p_group $group)
    {
        $list=null;
        if(isset($request->tag)){
            $list=$p_prodcut->whereHas('toTag',function ($uqery) use($request){
                $uqery->where('product',$request->tag);
            });
            return  ProdcutThumpnailResource::collection($list->with('toGroup','toPrice','toImage')->get());


        }
        if($request->mode=='listpage'){
            $findgroup=$group->where('url',$request->group)->first();
            $list=$p_prodcut->where('parent',$findgroup->id)
                ->orderByRaw('FIELD(status,1, 2, 0)')
                ->with('toColor.toColor','toAttr');

            if(isset($request->color)){
                $list = $list->whereHas('toColor', function ($query) use ($request) {
                    $query->whereIn('color', $request->color);
                });
            }
            if(isset($request->attr)){
                return  $list->get();
                return $request->attr;
                $list = $list->whereHas('toAttr', function ($query) use ($request) {
                    $query->whereIn('color', $request->color);
                });
            }
            $list=$list->paginate(10);
            return   ProdcutThumpnailResource::collection($list);
        }
      // return  $list->with('toGroup','toPrice','toImage')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,p_prodcut $p_prodcut)
    {
        return  ProdcutThumpnailResource::make($p_prodcut->where('id',$id)->with('toGroup','toPrice','toImage')->first());

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
    public function update(Request $request, $id)
    {
        //
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
