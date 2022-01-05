<?php

namespace App\Http\Controllers\api\v1;

use stdClass;
use App\Models\UserPurchase;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserPurchaseResource;

class AdminUserPurchaseController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $purchases = UserPurchase::paginate($request['limit'] ? $request['limit'] : 10);
        $page = new stdClass;
        $media_array = $purchases->toArray();
        $page->total_page = $media_array['last_page'];
        $page->per_page = $media_array['per_page'];
        $page->current_page = $media_array['current_page'];

        return $this->successPaginate(UserPurchaseResource::collection($purchases), $page);
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

    public function activeUnactivePurchase(Request $request)
    {
        $purchase = UserPurchase::find($request->purchase_id);
        if($purchase)
        {
            $active = !$purchase->is_active;
            $purchase->update(['is_active' => $active]);
            if($active)
            {
                return $this->success($purchase, 'User Purchase active successfully!');
            }else{
                return $this->success($purchase, 'User Purchase unactive successfully!');
            }
        }
    }
}
