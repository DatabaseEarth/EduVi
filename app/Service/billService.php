<?php

namespace App\Service;

use App\Models\bill;

class billService
{
    public function Bill_Check($Id_User){
        $query_builder = bill::where('Id_User','=',$Id_User)
        ->where('Status','=','gio-hang')
        ->first();
        return $query_builder;
    }
    public function Bill_Create($Id_User){
        $query_builder = bill::create([
            'Id_User'=>$Id_User,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        return $query_builder;
    }
    public function bill_confirm(
        $Id_User,
        $Name_Orderer,
        $Email_Orderer,
        $Phone_Orderer,
        $Address_Orderer,
        $Name_recipient,
        $Total,
        $Ship,
        $Total_Payment,
        $Id_Bill,
    ){
        $query_builder = bill::where('Id_Bill','=',$Id_Bill)
        ->update([
            'Id_User'=>$Id_User,
            'Name_Orderer'=>$Name_Orderer,
            'Email_Orderer'=>$Email_Orderer,
            'Phone_Orderer'=>$Phone_Orderer,
            'Address_Orderer'=>$Address_Orderer,
            'Name_recipient'=>$Name_recipient,
            'Total'=>$Total,
            'Ship'=>$Ship,
            'Total_Payment'=>$Total_Payment,
            'Status'=>'chuan-bi',
            'updated_at'=>now(),
        ]);
        return $query_builder;
    }
    public function Bill_Delete($Id_Bill){
        $query_builder = bill::where('Id_Bill','=',$Id_Bill)
        ->delete();
        return $query_builder;
    }
    public function Bill_GetAll($page){
        $query_builder = bill::paginate($page);
        return $query_builder;
    }
    public function Bill_GetByUser($Id_User,$desc_asc,$page){
        $query_builder = bill::where('Id_User','=',$Id_User)
        ->where('Status','!=','gio-hang')
        ->orderBy('Id_Bill',$desc_asc)
        ->paginate($page);
        return $query_builder;
    }
    public function Bill_Update($Status,$Id_Bill){
        $query_builder = bill::where('Id_Bill','=',$Id_Bill)
        ->update([
            'Status'=>$Status,
            'updated_at'=>now()
        ]);
        return $query_builder;
    }
    
    public function Bill_GetById($Id_Bill){
        $query_builder = bill::with('carts')->where('bill.Id_Bill','=',$Id_Bill)->first();
        return $query_builder;
    }
}
