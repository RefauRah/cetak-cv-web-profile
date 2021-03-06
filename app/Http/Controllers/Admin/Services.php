<?php

namespace App\Http\Controllers\Admin;

use App\MasterServices;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Datatables;

class Services extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(!session::get('login')){
            return redirect('admin/auth')->with('alert', 'You are not loged in!');
        }
        else{
            $data = array(
                'title' => "Services | Temuin"
            );
            return view('admin/services/services')->with($data);
        }
    }

    public function data(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $services = MasterServices::select([DB::raw('@rownum  := @rownum  + 1 AS rownum'), 'id', 'service', 'status', 'created_at', 'updated_at']);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }
        return Datatables::of($services)
        ->addColumn('action', function ($services) {
            return '
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <button type="button" class="btn btn-secondary">Aksi</button>
                
                    <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="'.url("admin/services/").'/'.$services->id.'/edit">Edit</a>
                        <form action="'.route("services.destroy", $services->id).'" method="post">
                        '.csrf_field().'
                        '.method_field("DELETE").'
                        <button class="dropdown-item" type="submit" onclick="return confirm(\'Yakin ingin menghapus data?\')">Hapus</button>
                        </form>
                    </div>
                    </div>
                </div>
            ';
        })
        ->addColumn('stat', function($services){
            if($services->status=="1"){
                return "True";
            }
            else{
                return "False";
            }
        })
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(!session::get('login')){
            return redirect('admin/auth')->with('alert', 'You are not loged in!');
        }
        else{
            $data = array(
                'title' => "Tambah Service | Temuin"
            );
            return view('admin/services/create')->with($data);
        }
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
        $data =  new MasterServices();
        $data->service = $request->get('service');
        $data->status = $request->get('status');
        $data->created_by = Session::get('id');
        $data->updated_by = Session::get('id');

        if($data->save()){
            return redirect('/admin/services')->with('alert-success', 'Berhasil menambahkan data!');
        }
        else{
            return redirect('/admin/services')->with('alert', 'Gagal menambahkan data!');
        }
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
        $data = array(
            'title' => "Edit Service | Temuin",
            'services' => MasterServices::find($id),
        );
        return view('admin/services/edit')->with($data);
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
        $data =  MasterServices::where('id',$id)->first();
        $data->service = $request->get('service');
        $data->status = $request->get('status');
        $data->updated_by = Session::get('id');

        if($data->save()){
            return redirect('/admin/services')->with('alert-success', 'Berhasil ubah data!');
        }
        else{
            return redirect('/admin/services')->with('alert', 'Gagal ubah data!');
        }
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
        $data =  MasterServices::where('id',$id)->first();

        if($data->delete()){
            return redirect('/admin/services')->with('alert-success', 'Berhasil hapus data!');
        }
        else{
            return redirect('/admin/services')->with('alert', 'Gagal hapus data!');
        }
    }
}
