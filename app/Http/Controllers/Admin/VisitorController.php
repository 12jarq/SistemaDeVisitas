<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\VisitorRequest;
use App\Models\Employee;
use App\Models\VisitingDetails;
use App\Http\Services\Visitor\VisitorService;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class VisitorController extends Controller
{
    protected $visitorService;

    public function __construct(VisitorService $visitorService)
    {
        $this->visitorService = $visitorService;

        $this->middleware('auth');
        $this->data['sitetitle'] = 'Visitors';

        $this->middleware(['permission:visitors'])->only('index');
        $this->middleware(['permission:visitors_create'])->only('create', 'store');
        $this->middleware(['permission:visitors_edit'])->only('edit', 'update');
        $this->middleware(['permission:visitors_delete'])->only('destroy');
        $this->middleware(['permission:visitors_show'])->only('show');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('admin.visitor.index');
    }


    public function create(Request $request)
    {

        $this->data['employees'] = Employee::where('status', Status::ACTIVE)->get();

        return view('admin.visitor.create', $this->data);
    }

    public function store(VisitorRequest $request)
    {
        $this->visitorService->make($request);
        return redirect()->route('admin.visitors.index')->withSuccess('The data inserted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $this->data['visitingDetails'] = $this->visitorService->find($id);
        if ($this->data['visitingDetails']) {
            return view('admin.visitor.show', $this->data);
        }else{
            return redirect()->route('admin.visitors.index');
        }
    }

    public function edit($id)
    {
        $this->data['employees'] = Employee::where('status', Status::ACTIVE)->get();
        $this->data['visitingDetails'] = $this->visitorService->find($id);
        if ($this->data['visitingDetails']){
            return view('admin.visitor.edit', $this->data);
        }else {
            return redirect()->route('admin.visitors.index');
        }
    }

    public function update(VisitorRequest $request,VisitingDetails $visitor)
    {
        $this->visitorService->update($request,$visitor->id);
        return redirect()->route('admin.visitors.index')->withSuccess('The data updated successfully!');
    }

    public function destroy($id)
    {
        $this->visitorService->delete($id);
        return route('admin.visitors.index')->withSuccess('The data delete successfully!');
    }


    public function getVisitor(Request $request)
    {
        $visitingDetails = $this->visitorService->all();

        $i            = 1;
        $visitingDetailArray = [];
        if (!blank($visitingDetails)) {
            foreach ($visitingDetails as $visitingDetail) {
                $visitingDetailArray[$i]          = $visitingDetail;
                $visitingDetailArray[$i]['setID'] = $i;
                $i++;
            }
        }
        return Datatables::of($visitingDetailArray)
            ->addColumn('action', function ($visitingDetail) {
                $retAction ='';

                if(auth()->user()->can('visitors_show')) {
                    $retAction .= '<a href="' . route('admin.visitors.show', $visitingDetail) . '" class="btn btn-sm btn-icon mr-2  float-left btn-info" data-toggle="tooltip" data-placement="top" title="View"><i class="far fa-eye"></i></a>';
                }

                if(auth()->user()->can('visitors_edit')) {
                    $retAction .= '<a href="' . route('admin.visitors.edit', $visitingDetail) . '" class="btn btn-sm btn-icon float-left btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="far fa-edit"></i></a>';
                }


                if(auth()->user()->can('visitors_delete')) {
                    $retAction .= '<form class="float-left pl-2" action="' . route('admin.visitors.destroy', $visitingDetail). '" method="POST">' . method_field('DELETE') . csrf_field() . '<button class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="fa fa-trash"></i></button></form>';
                }

                return $retAction;
            })

            ->editColumn('name', function ($visitingDetail) {
                return Str::limit($visitingDetail->visitor->name, 50);
            })
            ->addColumn('image', function ($visitingDetail) {
                return '<figure class="avatar mr-2"><img src="' . $visitingDetail->images . '" alt=""></figure>';
            })
            ->editColumn('visitor_id', function ($visitingDetail) {
                return $visitingDetail->reg_no;
            })
            ->editColumn('email', function ($visitingDetail) {
                return Str::limit($visitingDetail->visitor->email, 50);
            })
            ->editColumn('phone', function ($visitingDetail) {
                return Str::limit($visitingDetail->visitor->phone, 50);
            })
            ->editColumn('employee_id', function ($visitingDetail) {
                return $visitingDetail->employee->user->name;
            })
            ->editColumn('date', function ($visitingDetail) {
                return date('d-m-Y h:i A', strtotime($visitingDetail->checkin_at));
            })

            ->editColumn('id', function ($visitingDetail) {
                return $visitingDetail->setID;
            })
            ->rawColumns(['name', 'action'])
            ->escapeColumns([])
            ->make(true);

    }
}
