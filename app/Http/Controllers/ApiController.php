<?php

namespace App\Http\Controllers;
use App\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getDataPost(){
        $data = PostModel::all();

        return response()->json([
            'data' => $data,
        ]);
        // return json_encode($data);
    }

     public function processAdd(Request $request)
    {
        $data = array(
            'title'								=> $request->title,
            'content'							=> $request->content,
            'image'						        => $request->image,
        );

        try {
            DB::beginTransaction();
            PostModel::insert([
                'title'							=> $data['title'],
                'content'						=> $data['content'],
                'image'							=> $data['image'],
            ]);

            DB::commit();
            $message = array(
                'pesan' => 'berhasil tambah data',
                'alert' => 'success',
            );
            return $message;
        } catch (\Exception $e) {
            DB::rollback();
            report($e);
            $message = array(
                'pesan' => 'gagal tambah data',
                'alert' => 'error'
            );
            return $message;
        }

    }

    public function getPostDetail($id){
        $data = PostModel::findOrFail($id);

        return response()->json([
            'data' => $data,
        ]);
    }

    public function processUpdate($id,Request $request)
    {

        $data = array(
            'id'								=> $id,
            'title'								=> $request->title,
            'content'							=> $request->content,
            'image'						        => $request->image,
        );

        try {
            DB::beginTransaction();
            PostModel::where('id', $id)
            ->Update([
                'title'							=> $data['title'],
                'content'						=> $data['content'],
                'image'							=> $data['image'],
            ]);

            DB::commit();
            $message = array(
                'pesan' => 'berhasil edit data',
                'alert' => 'success',
            );
            return $message;
        } catch (\Exception $e) {
            DB::rollback();
            report($e);
            $message = array(
                'pesan' => 'gagal edit data',
                'alert' => 'error'
            );
            return $message;
        }

    }


    // hapus sementara
    public function delete($id)
    {
            try {
              $data = PostModel::find($id);
              $data->delete();

            DB::commit();
            $message = array(
                'pesan' => 'berhasil hapus data',
                'alert' => 'success',
            );
            return $message;
        } catch (\Exception $e) {
            DB::rollback();
            report($e);
            $message = array(
                'pesan' => 'gagal hapus data',
                'alert' => 'error'
            );
            return $message;
        }
    }
    
}
