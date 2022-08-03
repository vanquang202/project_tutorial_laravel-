<?php
namespace App\Services\Traits;

trait ReponseApi
{
     public function responseApi($response)
    {
        return response()->json($response);
    }
}