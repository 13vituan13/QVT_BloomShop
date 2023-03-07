<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\APIStatusController;
use Illuminate\Support\Facades\DB;
use Exception;

use App\Models\Product;


class ProductController extends APIStatusController
{
    public function store(Request $request)
    {
        $input = $request->all();



        //Start Insert
        DB::beginTransaction();
        try {
            Product::create($input);
            // $lastid = Product::getPdo()->lastInsertId();
            // $res = array('id' => $lastid);
            //End Insert
            DB::commit();
            return $this->successResponse('Insert successfully created.', 1);
        } catch (Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }


    public function update(Request $request, $Kokyaku_Id)
    {

        // $input = $request->all();
        // $Kokyaku = MKokyaku::find($Kokyaku_Id);
        //     $Kokyaku->Kaishamei = $input['Kaishamei'];
        //     $Kokyaku->KaishameiKana = $input['KaishameiKana'];
        //     $Kokyaku->YuubinBangou = $input['YuubinBangou'];
        //     $Kokyaku->Todoufuken = $input['Todoufuken'];
        //     $Kokyaku->Shozaichi = $input['Shozaichi'];
        //     $Kokyaku->Tatemonomei = $input['Tatemonomei'];
        //     $Kokyaku->Tel = $input['Tel'];
        //     $Kokyaku->Fax = $input['Fax'];
        //     $Kokyaku->Tantoushamei = $input['Tantoushamei'];
        //     $Kokyaku->TantoushaMail = $input['TantoushaMail'];
        //     $Kokyaku->Flg_Kaiyaku = $input['Flg_Kaiyaku'];

        // //Start update
        // DB::beginTransaction();
        // try {

        //     $Kokyaku->save();
        //     //End update
        //     DB::commit();
        //     return $this->successResponse('Koguchi successfully updated.', $Kokyaku);
        // } catch (Exception $e) {
        //     DB::rollBack();
        //     throw new Exception($e->getMessage());
        // }

    }

    public function destroy($Kokyaku_Id)
    {
        // $Kokyaku = MKokyaku::find($Kokyaku_Id);

        // if (is_null($Kokyaku)) {
        //     return $this->errorResponse('Koguchi does not exist.');
        // }

        // $Kokyaku->delete();

        // return $this->successResponse('Kokyaku successfully deleted.');
    }
}
