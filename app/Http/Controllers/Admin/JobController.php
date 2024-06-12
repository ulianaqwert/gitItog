<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JobRequest;
use App\Models\Jobs;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function index()
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $jobs = Jobs::orderBy('id', 'DESC')->get();
                return view('admin.job.index', compact('jobs'));
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function create()
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                return view('admin.job.create');
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function store(JobRequest $request)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                // dd($request);
                // $request->validate([
                //     'name' => 'required',
                //     'payment' => 'required',
                //     'schedule' => 'required',
                //     'description' => 'required'
                // ]);
                $job = new Jobs();
                $job->name = $request->name;
                $job->payment = $request->payment;
                $job->schedule = $request->schedule;
                $job->description = $request->description;
                if (!empty($_FILES)) {
                    move_uploaded_file(
                        $_FILES['img']['tmp_name'],
                        'image/job/' . $_FILES['img']['name']
                    );
                    $job->photo = '/image/job/' . $_FILES['img']['name'];
                }
                if ($_FILES['img']['name'] == '')
                    return redirect()->route('jobs.create')->withInput()->withErrors(['img' => 'Загрузите файл']);
                $job->save();
                return redirect()->back()->withSuccess('Вакансия была успешно добавлена');
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function edit(string $id)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $job = Jobs::find($id);
                return view('admin.job.edit', compact('job'));
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function update(JobRequest $request, Jobs $job)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $job->name = $request->name;
                $job->payment = $request->payment;
                $job->description = $request->description;
                $job->schedule = $request->schedule;
                if (!empty($_FILES)) {
                    move_uploaded_file(
                        $_FILES['imgRed']['tmp_name'],
                        'image/job/' . $_FILES['imgRed']['name']
                    );
                    $job->photo = '/image/job/' . $_FILES['imgRed']['name'];
                }
                if ($_FILES['imgRed']['name'] == '') {
                    $job->photo = $request->imgHidden;
                }
                $job->save();
                return redirect()->back()->withSuccess('Вакансия была успешно обновлена');
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function destroy(string $id)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $job = Jobs::find($id);
                $job->delete();
                return redirect()->back()->withSuccess('Вакансия была успешно удалена');
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }
}
