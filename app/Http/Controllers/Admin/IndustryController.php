<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class IndustryController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.industries.index', ['industries' => DB::table('industries')->paginate()]);
    }

    public function show(Industry $industry)
    {
        return view('admin.industries.show', ['industry' => $industry]);
    }

    public function add(Request $request)
    {
        return view('admin.industries.add');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:industries', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $industry = new Industry();
        $industry->name = $request->get('name');

        $industry->save();

        return redirect()->intended(route('admin.industries'));
    }

    public function edit(Industry $industry)
    {
        return view('admin.industries.edit', ['industry' => $industry]);
    }

    public function update(Request $request, Industry $industry)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:industries', 'max:255'],
        ]);

        $validator->sometimes('name', 'unique:industries', function ($input) use ($industry) {
            return strtolower($input->name) != strtolower($industry->name);
        });

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $industry->name = $request->get('name');

        $industry->save();

        return redirect()->intended(route('admin.industries'));
    }
}
