<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\AgentRequest;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agent = Agent::where('id', '>', 10)->paginate(10);
        $agent->getCollection()->transform(function ($a) {
            $a->desc = Str::limit($a->description, 50);
            return $a;
        });

        $title = 'Delete Agent!';
        $text = 'Are you sure you want to delete?';
        confirmDelete($title, $text);
        return view('agent.index', compact('agent'));
    }

    public function search(Request $request)
    {
        $key = $request->keyword;

        $agent = Agent::whereAny([
            'name',
            'description'
        ], 'LIKE', "%$key%")->paginate(5);

        $agent->getCollection()->transform(function ($a) {
            $a->desc = Str::limit($a->description, 50);
            return $a;
        });

        $title = 'Delete Agent!';
        $text = 'Are you sure you want to delete?';
        confirmDelete($title, $text);
        return view('agent.index', compact('agent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agent.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgentRequest $request)
    {
        try {
            $file = $request->file('photo');
            $newName = uniqid() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images/agents/'), $newName);

            Agent::create([
                'name' => $request->name,
                'description' => $request->description,
                'release_date' => now(),
                'image' => $newName
            ]);

            Alert::success('Success', 'Success add data');
        } catch (Exception $e) {
            Alert::error('Error', 'Error while add data');
        }
        return redirect('/agent');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $agent = Agent::where('id', '=', $id)->first();
        $title = 'Delete Agent!';
        $text = 'Are you sure you want to delete?';
        confirmDelete($title, $text);
        return view('agent.detail', ['title' => "Agent-$id", 'agent' => $agent]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $agent = Agent::where('id', '=', $id)->first();
        return view('agent.edit', ['agent' => $agent]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'newPhoto' => 'extensions:jpg,png,jpeg,webp|max:2048',
        ], [
            'name.required' => 'Name is required',
            'description.required' => 'Description is required',
            'newPhoto.extensions' => 'Format allow (jpg, png, jpeg, webp)',
        ]);

        try {
            $photo = '';
            if (isset($request->newPhoto)) {
                $file = $request->file('newPhoto');
                $new = uniqid() . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('images/agents/'), $new);

                unlink(public_path('images/agents/' . $request->oldPhoto));

                $photo = $new;
            } else {
                $photo = $request->oldPhoto;
            }

            Agent::where('id', '=', $request->id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $photo
            ]);
            Alert::success('Success', 'Succes Update Data');
        } catch (Exception $e) {
            Alert::error('Error', 'Failed to update data');
        }
        return redirect('/agent');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $agent = Agent::where('id', '=', $id)->first();
            unlink(public_path('images/agents/' . $agent->image));

            Agent::where('id', '=', $agent->id)->delete();
            Alert::success('Success', 'Delete agent success');
        } catch (Exception $e) {
            Alert::Error('Failed', 'Failed to delete agent');
        }

        return redirect('/agent');
    }
}
