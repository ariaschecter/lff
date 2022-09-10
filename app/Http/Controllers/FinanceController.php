<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finance;
use Alert;

class FinanceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->keyword;
        if($search){
            $data = Finance::where('ref', 'LIKE', "%{$search}%")
                                ->orWhere('nominal', 'LIKE', "%{$search}%")
                                ->orWhere('desc', 'LIKE', "%{$search}%")
                                ->paginate(10);
        } else {
            $data = Finance::paginate(10);
        }
        $detail = Finance::getDetail();

        return view('admin.transaction.index', [
            'active' => 'transaction',
            'title' => 'Transaction',
            'data' => $data,
            'detail' => $detail,
        ]);
    }

    public function create()
    {
        return view('admin.transaction.add', [
            'active' => 'transaction',
            'title' => 'Add Transaction',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ref' => 'required',
            'nominal' => 'required',
            'desc' => 'required',
        ]);

        $data = [
            'ref' => $request->ref,
            'nominal' => $request->nominal,
            'desc' => $request->desc,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        Finance::insert($data);
        Alert::success('Congrats', 'You\'ve Add New Transaction!');
        return redirect('admin/transaction');
    }

    public function edit(Finance $finance)
    {
        return view('admin.transaction.edit', [
            'active' => 'transaction',
            'title' => 'Edit Transaction',
            'data' => $finance,
        ]);
    }

    public function update(Request $request, Finance $finance)
    {

        $validated = $request->validate([
            'ref' => 'required',
            'nominal' => 'required',
            'desc' => 'required',
        ]);

        $update = [
            'ref' => $request->ref,
            'nominal' => $request->nominal,
            'desc' => $request->desc,
            'updated_at' => now(),
        ];
        Finance::where('id', $finance->id)->update($update);
        Alert::success('Congrats', 'You\'ve Update a Transaction!');
        return redirect('admin/transaction');
    }

    public function destroy(Finance $finance)
    {
        Finance::where('id', $finance->id)->delete();
        Alert::success('Congrats', 'You\'ve Deleted a Transaction!');
        return redirect('admin/transaction');
    }
}
